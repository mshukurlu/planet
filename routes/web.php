<?php

use App\Parts\Router\Route;

Route::get('/murad',function ()
{
    echo 'Salam';
});

Route::get('/home','MainController@index');

Route::get('/profile/{id}/gallery/{gallery_id}','MainController@gallery');