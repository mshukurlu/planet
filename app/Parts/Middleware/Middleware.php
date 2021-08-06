<?php


namespace App\Parts\Middleware;


/**
 * Class Middleware
 * @package App\Parts\Middleware
 */
class Middleware
{
    /**
     * @var array
     */
    protected static $middlewares = [];

    /**
     * @param $name
     * @param $closure
     */
    public static function add($name, $closure)
      {
          static::$middlewares[] = ['name'=>$name,'closure'=>$closure];
      }

    /**
     *
     */
    public static function applyMiddlewares()
      {
            foreach (self::$middlewares as $middleware)
            {
                call_user_func_array(array($middleware['closure'],'run'),array());
            }
      }


}
