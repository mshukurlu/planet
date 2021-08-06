<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Parts\Accessibility\Session;
use App\Parts\views\View;

class LoginController extends Controller
{
    public function login()
    {
        echo View::render('login.php');
    }

    public function submit()
    {
        echo 'Submit controller';
    }

}
