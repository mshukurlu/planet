<?php
namespace App\Parts\Router;

use App\Controllers\Controller;


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
        foreach (self::$routes[request_method()] as $route)
        {
            if($request_path==$route['path'])
            {
               if(is_callable($route['callback']))
               {
                return   call_user_func($route['callback']);
               }else
                   {
                       [$controllerName,$method] = explode('@',$route['callback']);
                       $controllerName = '\App\Controllers\\'.$controllerName;
                       $controller = new $controllerName();
                return    call_user_func_array(array($controller,$method),array());
                   }

            }
        }

       return not_found();
    }
}