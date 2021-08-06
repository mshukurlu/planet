<?php
namespace App\Controllers\Auth\Traits;

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

trait AuthUser{
    public function guest()
    {
        GuestMiddleware::run();
    }

    public function auth()
    {
        AuthMiddleware::run();
    }
}
