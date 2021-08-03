<?php


namespace App\Parts\Database;


interface IDatabaseConnection
{
    /**
     * @return mixed
     */
    public static function getInstance();

    /**
     * @return mixed
     */
    public function connection();
}
