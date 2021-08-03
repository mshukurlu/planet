<?php

use App\Parts\Database\DatabaseConnection;
use App\Parts\Database\PdoDatabaseConnection;
use App\Parts\Database\Query\Database;
use App\Parts\Router\Route;

Route::get('/',function (){
    $database = new DatabaseConnection(PdoDatabaseConnection::getInstance());

    $fetch = $database->connect()->query('SELECT * FROM users');

    $f = $fetch->fetchAll();

    print_r($f);
});

Route::get('/db-query',function (){
    $db_query = (new \App\Parts\Database\Query\DatabaseConnectDriverSelector(new \App\Parts\Database\Query\PdoQueryBuilder()))
    ->all();

    dd($db_query);
});


Route::get('/db-test',function (){
  $users = (new Database())->table('users')->find(1);

  print_r($users);
});
Route::get('/murad',function ()
{
   // echo 'Salam';

});

Route::get('/home','MainController@index');

Route::get('/profile/{id}/gallery/{gallery_id}','MainController@gallery');
