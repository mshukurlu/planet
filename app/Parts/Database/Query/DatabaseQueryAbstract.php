<?php


namespace App\Parts\Database\Query;


use App\Parts\Database\Query\Traits\BasicHelperMethods;
use App\Parts\Database\Query\Traits\CompileSql;
use App\Parts\Database\Query\Traits\ConditionFunctions;
use App\Parts\Database\Query\Traits\PdoMethods;

abstract class DatabaseQueryAbstract
{
    use CompileSql,ConditionFunctions,BasicHelperMethods,PdoMethods;

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
     * @var array|null
     */
    /**
     * @var array|null
     */
    /**
     * @var array|null
     */
    protected $params = [],
        $columns = [],
        $limit=null,
        $offset=null,
        $order=array('column'=>null,'direction'=>'desc');

    private $sqlQuery = null;

    /**
     * @param $id
     */
    public function find($id)
    {
        return $this->where('id', '=', $id)->limit(1)->first();
    }


    /**
     * @return mixed
     */
    public abstract function get();

    /**
     * @return mixed
     */
    public abstract function first();
}
