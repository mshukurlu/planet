<?php

use App\Parts\Database\DatabaseConnection;
use App\Parts\Database\PdoDatabaseConnection;
use App\Parts\Database\Query\Database;
use App\Parts\Router\Route;

Route::get('/login','Auth\LoginController@login');

Route::post('/login','Auth\LoginController@submit');


