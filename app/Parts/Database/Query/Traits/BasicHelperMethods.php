<?php


namespace App\Parts\Database\Query\Traits;


trait BasicHelperMethods
{
    /**
     * @param $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }


    protected function getColumns()
    {
        return count($this->columns) > 0 ?
            implode(',', $this->columns) : '*';
    }

    private function getSqlQuery()
    {
        return $this->sqlQuery;
    }

    private function extendSqlQuery($extra_sql)
    {
        $this->sqlQuery .= $extra_sql;
    }

    public function getTableName()
    {
        return $this->table;
    }

    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->order['column'] = $column;
        $this->order['direction'] = $direction;
        return $this;
    }

    public function limit($limit = 10)
    {
        $this->limit = $limit;

        return $this;
    }
}
