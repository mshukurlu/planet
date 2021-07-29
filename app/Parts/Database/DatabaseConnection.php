<?php


namespace App\Parts\Database;


class DatabaseConnection
{
    protected $connection;
    public function __construct(IDatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function connect()
    {
       $instance = PdoDatabaseConnection::getInstance();
       return $instance->connection();
    }
}
