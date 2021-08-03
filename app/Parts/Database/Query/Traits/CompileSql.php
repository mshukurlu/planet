<?php


namespace App\Parts\Database\Query\Traits;


trait CompileSql
{
    /**
     * @return string
     */
    public function compileSelectSql()
    {
        $conditions = $this->compileConditionsSql();

        $columns = $this->getColumns();

        $this->extendSqlQuery(sprintf('SELECT %s FROM %s where %s', $columns, $this->getTableName(), $conditions));

        $this->compileOrderSql();

        $this->compileLimitSql();

        $this->compileOffsetSql();

        return $this->getSqlQuery();
    }

    protected function compileOrderSql()
    {
        if ($this->order['column']) {
            $this->extendSqlQuery(sprintf(' order by %s %s', $this->order['column'], $this->order['direction']));
        }
    }
    protected function compileLimitSql()
    {
        if ($this->limit) {
            $this->extendSqlQuery(sprintf(' limit %s', $this->limit));
        }
    }

    protected function compileOffsetSql()
    {
        if ($this->offset) {
            $this->extendSqlQuery(sprintf(' offset %s', $this->offset));
        }
    }

    protected function compileConditionsSql()
    {
        $i = 0;
        $conditions = '';
        foreach ($this->where as $condition) {
            if (count($this->where) > $i && $i > 0) {
                $conditions .= $condition['type'];
            }
            $conditions .= ' ' . $condition['column'] . ' ' . $condition['operator'] . ' :' . $condition['column'];
            $i++;

            $this->params[] = array('param' => ':' . $condition['column'],
                'value' => $condition['value']);

        }

        return $conditions;
    }

}
