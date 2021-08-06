<?php


namespace App\Controllers\Auth;

use App\Parts\Auth\Auth;
use App\Parts\Response\Redirect;

class LogoutController
{
    public function logout()
    {
        if(Auth::logout())
        {
            Redirect::to('/login');
        }
    }
}
