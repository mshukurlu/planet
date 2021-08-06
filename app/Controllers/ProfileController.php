<?php


namespace App\Controllers;


use App\Parts\Auth\Auth;

class ProfileController
{
    public function index(){
       $user = Auth::getUser();

        echo 'ID : '.$user['id'].'<br>';

        echo 'Email '.$user['email'];
    }

}
