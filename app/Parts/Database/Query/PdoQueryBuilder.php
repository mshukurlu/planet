<?php


namespace App\Parts\Database\Query;


use App\Parts\Database\DatabaseConnection;
use App\Parts\Database\PdoDatabaseConnection;

class PdoQueryBuilder implements IQuery
{
    protected $databaseConnection,$table,$where=[];
    public function __construct($table)
    {
        $this->table = $table;
        $this->databaseConnection = (new DatabaseConnection(PdoDatabaseConnection::getInstance()))
                                        ->connect();
    }

    public function all()
    {
        $query = $this->databaseConnection->query("SELECT * FROM {$this->table}");
        return $query->fetchAll();
    }

    public function where($column, $operator, $value)
    {
        // TODO: Implement where() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function get()
    {
        // TODO: Implement get() method.
    }
}
