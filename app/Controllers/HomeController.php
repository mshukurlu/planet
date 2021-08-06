<?php


namespace App\Controllers;


use App\Parts\Auth\Auth;
use App\Parts\views\View;

class HomeController extends  Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->auth();
    }

    /**
     *
     */
    public function index()
    {
        $user = Auth::getUser();
        echo View::render('home',compact('user'));
    }
}
