<?php


namespace App\Parts\Middleware;


abstract class MiddlewareAbstract
{
    public static function next()
    {
        return true;
    }
    public abstract static function run();
}
