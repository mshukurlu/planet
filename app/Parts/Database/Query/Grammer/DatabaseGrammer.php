<?php


namespace App\Parts\Database\Query\Grammer;


abstract class DatabaseGrammer
{
    protected $databaseGrammer;
    public function __construct(IDatabaseGrammer $databaseGrammer)
    {
        $this->databaseGrammer = $databaseGrammer;
    }

    public function getGrammer()
    {
        return $this->databaseGrammer;
    }
}
