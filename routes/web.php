<?php

use App\Parts\Database\DatabaseConnection;
use App\Parts\Database\PdoDatabaseConnection;
use App\Parts\Router\Route;

Route::get('/',function (){
    echo 'Test';
});

Route::get('/murad',function ()
{
    echo 'Salam';
});

Route::get('/home','MainController@index');

Route::get('/profile/{id}/gallery/{gallery_id}','MainController@gallery');
