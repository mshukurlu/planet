<?php
namespace App\Parts\Database;
use App\Parts\Database\IDatabaseConnection;
use PDO;


class PdoDatabaseConnection implements IDatabaseConnection {

    private $connection;

    private static $instance = null;
    private function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=planet', 'root', '');
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
