<?php


namespace App\Parts\Database\Query\Traits;


trait PdoMethods
{
    public function preparePdoStatement($statement,$params)
    {
        $statement = $this->databaseConnection->prepare($statement);

        foreach ($params as $param)
        {
            $statement->bindParam($param['param'],$param['value']);
        }
        $statement->execute();

        return $statement;
    }
}
