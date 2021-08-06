<?php

namespace App\Parts\Auth;

use App\Parts\Accessibility\Session;
use App\Parts\Database\Query\Database;
use App\Parts\Response\Redirect;
use App\Parts\Security\Hash\Hasher;

class Auth{

    public static $redirect_url = '/home';
    public static function check($array)
    {
      $user =  (new Database)
            ->table('users')
            ->where('email','=',$array['email'])
            ->where('password','=',Hasher::make($array['password']))
        ->first(['id']);


      if(!$user)
      {
        return false;
      }

      Session::add('authenticate',true);
      Session::add('userId',$user['id']);
      return true;
    }


    public static function getRedirectUrl()
    {
        return self::$redirect_url;
    }

    public static function setRedirectUrl($url)
    {
        self::$redirect_url = $url;
    }


    public static function logout()
    {
        return Session::kill(array('authenticate','userId'));
    }

    public static function getUser()
    {
        return (new Database)
            ->table('users')
           ->find(Session::get('userId'));
    }

    public static function isAuthenticated()
    {
        return Session::has('userId');
    }
}
