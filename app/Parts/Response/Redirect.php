<?php


namespace App\Parts\Response;


class Redirect
{
    public static function to($url)
    {
        return self::makeRedirection($url);
    }

    public static function makeRedirection($url){
        header("Location: ".$url);
        exit;
    }
}
