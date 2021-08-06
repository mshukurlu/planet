<?php


namespace App\Parts\Accessibility;


class Session
{
    public static function get($key){
        return self::has($key) ? $_SESSION[$key]: null;
    }

    public static function has($key)
    {
        if(isset($_SESSION[$key]))
        {
            return true;
        }

        return false;
    }

    public static function add($key,$value)
    {
        $_SESSION[$key] = $value;

        return $value;
    }
    public static function kill($key)
    {
        if(is_array($key))
        {
            foreach ($key as $item)
            {
                unset($_SESSION[$item]);
            }
            return  true;
        }
             unset($_SESSION[$key]);
             return true;
    }
}
