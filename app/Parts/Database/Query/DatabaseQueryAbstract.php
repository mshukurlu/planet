<?php


namespace App\Parts\Database\Query;


use App\Parts\Database\Query\Traits\BasicHelperMethods;
use App\Parts\Database\Query\Traits\CompileSql;
use App\Parts\Database\Query\Traits\ConditionFunctions;

abstract class DatabaseQueryAbstract
{
    use CompileSql,ConditionFunctions,BasicHelperMethods;

    /**
     * @var mixed
     */
    /**
     * @var mixed
     */
    /**
     * @var array|mixed
     */
    protected $databaseConnection=null,$table,$where=[];
    /**
     * @var array
     */
    /**
     * @var array
     */
    /**
     * @var array
     */
    protected $params = [],$columns = [],$limit=null,$offset=null,$order=array('column'=>null,'direction'=>'desc');
    private $sqlQuery = null;

    /**
     * @param $id
     */
    public function find($id)
    {
        return $this->where('id', '=', $id)->limit(1)->first();
    }

    public function prepareStatement($statement,$params)
    {
        $statement = $this->databaseConnection->prepare($statement);

        foreach ($params as $param)
        {
            $statement->bindParam($param['param'],$param['value']);
        }
        $statement->execute();

        return $statement;
    }
    public abstract function get();
    public abstract function first();
}
