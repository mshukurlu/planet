<?php


namespace App\Parts\Response;


use App\Parts\Accessibility\Session;

class Errors
{
    /**
     * @var array
     */
    protected static $errors = [];

    /**
     * @param $name
     * @param $error
     */
    public static function add($name, $error)
    {
        array_push(self::$errors, ['name'=>$name,'error'=>$error]);
        Session::add('errors', self::$errors);
    }

    /**
     * @return mixed|null
     */
    public static function get()
    {
        $errors = Session::get('errors');;
        Session::kill('errors');
        return $errors;
    }

    /**
     * @return bool
     */
    public static function has()
    {
        return Session::has('errors');
    }
}
