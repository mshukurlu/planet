<?php
namespace App\Parts\Request;

/**
 * Class Request
 * @package App\Parts\Request
 */
class Request
{
    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return $_REQUEST[$key];
    }

    /**
     * @return mixed
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
