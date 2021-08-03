<?php


namespace App\Parts\Database\Query;


/**
 * Class Database
 * @package App\Parts\Database\Query
 */
class Database
{
    /**
     * @var PdoQueryBuilder
     */
    private $queryBuilder;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->queryBuilder = new PdoQueryBuilder();
    }

    /**
     * @param $table_name
     * @return $this
     */
    public function table($table_name) : IQuery
    {
      $this->queryBuilder->setTable($table_name);
      return  $this->queryBuilder;
    }

}

