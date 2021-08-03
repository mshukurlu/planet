<?php


namespace App\Parts\Database\Query;


/**
 * Class Database
 * @package App\Parts\Database\Query
 */
class Database
{
    /**
     * @var
     */
    /**
     * @var array
     */
    protected $table, $result = [];
    /**
     * @var PdoQueryBuilder
     */
    private $queryBuilder = null;

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
    public function table($table_name)
    {
      $this->queryBuilder->setTable($table_name);
        return $this;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->queryBuilder->all($this->table);
    }

    /**
     * @param $column
     * @param $opeator
     * @param $value
     * @return $this
     */
    public function where($column, $opeator, $value) : PdoQueryBuilder
    {
        $this->queryBuilder->where($column, $opeator, $value);
        return  $this->queryBuilder;
    }


    /**
     * @param $id
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     *
     */
    public function get($columns = [])
    {
       return $this->queryBuilder->get( );
    }

    /**
     *
     */
    public function query()
    {
        // TODO: Implement query() method.
    }

    /**
     * @param $table
     * @param $columns
     * @param $conditions
     */
    public function select($table, $columns, $conditions)
    {
        // TODO: Implement select() method.
    }
}

