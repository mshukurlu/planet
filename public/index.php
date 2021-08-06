<?php

//Murad Shukurlu
use App\Parts\ServiceProvider;

define('PLANET_START',microtime(true));
define('BASE_DIR',__DIR__.'/../');

include '../vendor/autoload.php';
include '../start/boot.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

(new ServiceProvider())
    ->execute();
