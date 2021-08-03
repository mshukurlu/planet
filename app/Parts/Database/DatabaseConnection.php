<?php


namespace App\Parts\Database;


class DatabaseConnection
{
    /**
     * @var IDatabaseConnection
     */
    protected $connection;

    /**
     * DatabaseConnection constructor.
     * @param IDatabaseConnection $connection
     */
    public function __construct(IDatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return mixed
     */
    public function connect()
    {
       $instance = $this->connection->getInstance();
       return $instance->connection();
    }
}
