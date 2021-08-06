<?php


namespace App\Parts\Response;


use App\Parts\Accessibility\Session;

class Errors
{
    protected static $errors = [];

    public static function add($name,$error)
    {
        array_push(self::$errors, ['name'=>$name,'error'=>$error]);
        Session::add('errors', self::$errors);
    }

    public static function get()
    {
        $errors = Session::get('errors');;
        Session::kill('errors');
        return $errors;
    }

    public static function has()
    {
        return Session::has('errors');
    }
}
