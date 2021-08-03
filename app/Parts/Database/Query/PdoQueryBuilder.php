<?php


namespace App\Parts\Database\Query;


use App\Parts\Database\DatabaseConnection;
use App\Parts\Database\PdoDatabaseConnection;

class PdoQueryBuilder implements IQuery
{
    protected $databaseConnection,$table,$where=[];
    protected $params = [],$columns = [],$limit;

    public function __construct()
    {
        $this->databaseConnection = (new DatabaseConnection(
            PdoDatabaseConnection::getInstance()))
                                        ->connect();
    }

    public function all($table)
    {
        $query = $this->databaseConnection->query(sprintf("SELECT * FROM %s",$table));
        return $query->fetchAll();
    }

    public function where($column, $operator, $value)
    {
       array_push($this->where,array('column'=>$column,'operator'=>$operator,'value'=>$value,'type'=>' and '));

       return $this;
    }

    public function orWhere($column, $operator, $value)
    {
        array_push($this->where,array('column'=>$column,'operator'=>$operator,'value'=>$value,'type'=>' or '));

        return $this;
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function get($columns = [])
    {
      $this->columns  = $columns;
      $getCompiledSql = $this->compileSelectSql();

      $statement = $this->databaseConnection->prepare($getCompiledSql);

      foreach ($this->params as $param)
      {
          $statement->bindParam($param['param'],$param['value']);
      }
      $statement->execute();

      return $statement->fetchAll();
    }

    public function compileSelectSql()
    {
        $i=0;
        $conditions = '';
        foreach ($this->where as $condition)
        {
            if(count($this->where)>$i && $i>0)
            {
                $conditions .= $condition['type'];
            }
            $conditions .= ' '.$condition['column'].' '.$condition['operator'].' :'.$condition['column'];
            $i++;

           $this->params[] = array('param'=>':'.$condition['column'],
               'value'=>$condition['value']);

        }
        $columns = count($this->columns)>0 ?
            implode(',',$this->columns):'*';

        $sql = sprintf('SELECT %s FROM %s where %s ',$columns,$this->table,$conditions);

        return $sql;
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function select($table, $columns, $conditions)
    {
        // TODO: Implement select() method.
    }

    public function setTable($table)
    {
        $this->table = $table;
    }
}
