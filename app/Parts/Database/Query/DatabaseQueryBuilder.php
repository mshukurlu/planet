<?php


namespace App\Parts\Database\Query;

class DatabaseQueryBuilder
{
    protected $queryBuilder;
    public function __construct(IQuery $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function getBuilder()
    {
        return $this->queryBuilder;
    }

}
