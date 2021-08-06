<?php
namespace App\Middleware;

use App\Parts\Auth\Auth;
use App\Parts\Middleware\MiddlewareAbstract;
use App\Parts\Response\Errors;
use App\Parts\Response\Redirect;
use App\Parts\Security\Csrf\CsrfHandler;

class GuestMiddleware extends MiddlewareAbstract {
    public static function run()
    {
        if(Auth::isAuthenticated())
        {
            return Redirect::to('/home');
        }
        self::next();
    }
}
