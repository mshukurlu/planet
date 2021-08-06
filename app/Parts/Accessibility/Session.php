<?php


namespace App\Parts\Accessibility;


class Session
{
    /**
     * @param $key
     * @return mixed|null
     */
    public static function get($key){
        return self::has($key) ? $_SESSION[$key]: null;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        if(isset($_SESSION[$key]))
        {
            return true;
        }

        return false;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function add($key, $value)
    {
        $_SESSION[$key] = $value;

        return $value;
    }

    /**
     * @param $key
     * @return bool
     */
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
