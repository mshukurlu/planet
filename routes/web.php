<?php

use App\Parts\Router\Route;

Route::get('/murad',function ()
{
    echo 'Salam';
});

Route::get('/home','MainController@index');