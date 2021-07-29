<?php


namespace App\Parts\Database\Query;


class Database
{
        protected $table,$result=[];
        private $queryBuilder=null;


    public function table($table_name)
        {
            $this->table = $table_name;

            $this->queryBuilder = (new DatabaseQueryBuilder(new PdoQueryBuilder($this->table)))
                ->getBuilder();
            return $this;
        }

    public function all()
    {
        return $this->queryBuilder->all();
    }

    public function where($column,$opeator,$value)
    {
        $this->queryBuilder->where($column,$opeator,$value);
        return $this;
    }


}

