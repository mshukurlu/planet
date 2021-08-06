<?php
namespace App\Parts\Request;

class Request
{
    public static function get($key)
    {
        return $_REQUEST[$key];
    }
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
