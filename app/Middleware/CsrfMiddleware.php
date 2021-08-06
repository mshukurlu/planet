<?php
namespace App\Middleware;

use App\Parts\Middleware\MiddlewareAbstract;
use App\Parts\Security\Csrf\CsrfHandler;

class CsrfMiddleware extends MiddlewareAbstract {
    public static function run()
    {
            if(!CsrfHandler::check())
            {
                throw new  \ErrorException('CSRF PROTECTION');
            }
        self::next();
    }
}
