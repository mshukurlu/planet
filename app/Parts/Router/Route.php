<?php
namespace App\Parts\Router;

use App\Controllers\Controller;
use App\Middleware\CsrfMiddleware;
use App\Parts\Middleware\Middleware;
use App\Parts\Security\Csrf\CsrfHandler;


class Route
{
    protected static $routes = [];

    protected static $allowableMethods = ['GET','POST','DELETE','PUT'];

    public static function __callStatic($method, $parameters)
    {
        if(in_array(strtoupper($method),self::$allowableMethods)) {
           return self::$routes[strtoupper($method)][] = ['path' => $parameters[0],
                'callback' => $parameters[1]];
        }
        throw  new \ErrorException('Qeyd edilən methodun istifadə edilməsinə icazə yoxdur!');
    }

    public static function execude()
    {
        $request_path = request_uri();
        if(request_method()=='POST') {
            Middleware::add('csrf_checker', CsrfMiddleware::class);
        }
        Middleware::applyMiddlewares();
        foreach (self::$routes[request_method()] as $route)
        {
            $routePath = explode('/',$route['path']);
            $fullPath = explode('/',$request_path);
            $params = array();
            foreach ($routePath as $key=>$item)
            {
                    if (preg_match('@{.*?}@s', $item) and isset($fullPath[$key])
                        and isset($routePath[$key])) {
                        array_push($params, $fullPath[$key]);
                        $routePath[$key] = $fullPath[$key];
                    }
            }
            if($request_path==implode('/',$routePath))
            {
               if(is_callable($route['callback']))
               {
                return   call_user_func($route['callback']);
               }else
                   {
                       [$controllerName,$method] = explode('@',$route['callback']);
                       $controllerName = '\App\Controllers\\'.$controllerName;
                       $controller = new $controllerName();
                return    call_user_func_array(array($controller,$method),$params);
                   }

            }
        }

       return not_found();
    }
}
