<?php


namespace App\Parts\Database;


interface IDatabaseConnection
{
    public static function getInstance();

    public function connection();
}
