<?php


namespace App\Parts\Database\Query;


/**
 * Class Database
 * @package App\Parts\Database\Query
 */
class Database
{
    /**
     * @var PdoQueryBuilder
     */
    private $queryBuilder;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->queryBuilder = $this->getConnectionDriver();
    }

    /**
     * @param $table_name
     * @return $this
     */
    public function table($table_name): IQuery
    {
        $this->queryBuilder->setTable($table_name);
        return $this->queryBuilder;
    }

    private function getConnectionDriver()
    {
        if (isset($_ENV['db_connection_driver'])) {
            switch ($_ENV['db_connection_driver']) {
                case 'pdo':
                    return new PdoQueryBuilder();
                    break;
                case 'mysqli':
                    return new MysqliQueryBuilder();
                    break;
            }

        } else {
            return new PdoQueryBuilder();
        }

    }

}

