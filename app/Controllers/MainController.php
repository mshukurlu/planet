<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index()
    {
        echo 'Main Controller index';
    }

    public function gallery($id,$gallery_id)
    {
        echo 'Profile '.$id.' Gallery id '.$gallery_id;
    }
}