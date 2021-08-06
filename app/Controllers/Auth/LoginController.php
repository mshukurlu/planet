<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Parts\Accessibility\Session;
use App\Parts\Auth\Auth;
use App\Parts\Request\Request;
use App\Parts\Response\Errors;
use App\Parts\Response\Redirect;
use App\Parts\views\View;

/**
 * Class LoginController
 * @package App\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * LoginController constructor.
     * Middleware-ləri çağıra bilərik
     */
    public function __construct()
    {
        $this->guest();
    }

    /**
     * Login səhifəsi render edilir
     */
    public function login()
    {
        echo View::render('auth/login');
    }

    /**
     *
     */
    public function submit()
    {
       if(!Auth::check(array('email'=>Request::get('email'),'password'=>Request::get('password'))))
       {
           Errors::add('email','Login və ya şifrə yanlışdır!');
           Redirect::to('/login');
       }

       Redirect::to(Auth::getRedirectUrl());
    }

}
