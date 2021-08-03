<?php
namespace App\Parts\Database;
use App\Parts\Database\IDatabaseConnection;
use PDO;


class MysqliDatabaseConnection implements IDatabaseConnection {

    /**
     * @var false|\mysqli
     */
    private $connection;

    /**
     * @var null
     */
    private static $instance = null;

    /**
     * MysqliDatabaseConnection constructor.
     */
    private function __construct()
    {
        try {
            $this->connection = mysqli_connect('localhost', 'root', '','planet');
        }catch (\Exception $exception){
            print_r($exception);
        }
        }

    /**
     * @return MysqliDatabaseConnection|null
     */
    public static function getInstance()
    {
       if(!self::$instance)
        {
         self::$instance = new self();
        }
     return self::$instance;
    }

    /**
     * @return false|\mysqli
     */
    public function connection()
    {
        return $this->connection;
    }
}
