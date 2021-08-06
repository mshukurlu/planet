<?php
namespace App\Middleware;

use App\Parts\Auth\Auth;
use App\Parts\Middleware\MiddlewareAbstract;
use App\Parts\Response\Errors;
use App\Parts\Response\Redirect;
use App\Parts\Security\Csrf\CsrfHandler;

class AuthMiddleware extends MiddlewareAbstract {
    public static function run()
    {
        if(!Auth::isAuthenticated())
        {
           Errors::add('email','Auth fail!');
          return Redirect::to('/login');
        }
        self::next();
    }
}
