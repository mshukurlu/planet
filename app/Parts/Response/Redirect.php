<?php


namespace App\Parts\Response;


/**
 * Class Redirect
 * @package App\Parts\Response
 */
class Redirect
{
    /**
     * @param $url
     */
    public static function to($url)
    {
        return self::makeRedirection($url);
    }

    /**
     * @param $url
     */
    public static function makeRedirection($url){
        header("Location: ".$url);
        exit;
    }
}
