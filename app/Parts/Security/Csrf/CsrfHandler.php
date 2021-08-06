<?php


namespace App\Parts\Security\Csrf;


use App\Parts\Accessibility\Session;

class CsrfHandler
{
    public static function getToken()
    {
        if(Session::has('csrf_token'))
        {
            return Session::get('csrf_token');
        }

        return (new static())->getNewToken();
    }
    public  function getNewToken()
    {
      return  Session::add('csrf_token',$this->generateToken());
    }
    private function generateToken()
    {
        return substr(md5(uniqid()),0,20);
    }

    public static function check()
    {
        //technical debt - cover post class
        if(!isset($_POST['csrf_token']) || self::getToken()!=$_POST['csrf_token'])
        {
            return false;
        }
            return  true;
    }
}
