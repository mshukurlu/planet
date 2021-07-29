<?php
namespace App\Parts\Database;
use App\Parts\Database\IDatabaseConnection;
use PDO;


class MysqliDatabaseConnection implements IDatabaseConnection {

    private $connection;

    private static $instance = null;
    private function __construct()
    {
        try {
            $this->connection = mysqli_connect('localhost', 'root', '','planet');
        }catch (\Exception $exception){
            print_r($exception);
        }
        }

    public static function getInstance()
    {
       if(!self::$instance)
        {
         self::$instance = new self();
        }
     return self::$instance;
    }

    public function connection()
    {
        return $this->connection;
    }
}
