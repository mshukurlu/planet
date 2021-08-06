<?php

namespace App\Parts\Auth;

use App\Parts\Accessibility\Session;
use App\Parts\Database\Query\Database;
use App\Parts\Response\Redirect;
use App\Parts\Security\Hash\Hasher;

/**
 * Class Auth
 * @package App\Parts\Auth
 */
class Auth{

    /**
     * @var string
     */
    public static $redirect_url = '/home';

    /**
     * @param $array
     * @return bool
     */
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


    /**
     * @return string
     */
    public static function getRedirectUrl()
    {
        return self::$redirect_url;
    }

    /**
     * @param $url
     */
    public static function setRedirectUrl($url)
    {
        self::$redirect_url = $url;
    }


    /**
     * @return bool
     */
    public static function logout()
    {
        return Session::kill(array('authenticate','userId'));
    }

    /**
     * @return mixed
     */
    public static function getUser()
    {
        return (new Database)
            ->table('users')
           ->find(Session::get('userId'));
    }

    /**
     * @return bool
     */
    public static function isAuthenticated()
    {
        return Session::has('userId');
    }
}
