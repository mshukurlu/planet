<?php


namespace App\Parts\Database\Query\Traits;


use App\Parts\Database\Query\DatabaseQueryAbstract;

trait  ConditionFunctions
{
    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    public function where($column, $operator, $value)
    {

        array_push($this->where, array('column' => $column, 'operator' => $operator, 'value' => $value, 'type' => ' and '));

        return $this;
    }

    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    public function orWhere($column, $operator, $value)
    {
        array_push($this->where, array('column' => $column, 'operator' => $operator, 'value' => $value, 'type' => ' or '));

        return $this;
    }
}
