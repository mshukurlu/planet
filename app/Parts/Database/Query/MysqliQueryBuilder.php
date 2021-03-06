<?php


namespace App\Parts\Database\Query;


use App\Parts\Database\DatabaseConnection;
use App\Parts\Database\MysqliDatabaseConnection;
use App\Parts\Database\PdoDatabaseConnection;

class MysqliQueryBuilder extends DatabaseQueryAbstract implements IQuery
{
    /**
     * PdoQueryBuilder constructor.
     */
    public function __construct()
    {
        $this->databaseConnection = (new DatabaseConnection(
            MysqliDatabaseConnection::getInstance()))
                                        ->connect();
    }

    /**
     * @param $table
     * @return mixed
     */
    public function all($table)
    {
        $query = $this->databaseConnection->query(sprintf("SELECT * FROM %s",$table));
        return $query->fetch_all();
    }


    /**
     * @param array $columns
     * @return mixed
     */
    public function get($columns = [])
    {
      $this->columns  = $columns;
      $getCompiledSql = $this->compileSelectSql();

      $statement = $this->prepareStatement($getCompiledSql,$this->params);

      return $statement->fetchAll();
    }

    public function first($columns = [])
    {
        $this->columns  = $columns;
        $getCompiledSql = $this->compileSelectSql();

        $statement = $this->prepareStatement($getCompiledSql,$this->params);

        return $statement->fetch();
    }

    /**
     *
     */
    public function query($query)
    {
        $this->databaseConnection->query($query);
    }




}
