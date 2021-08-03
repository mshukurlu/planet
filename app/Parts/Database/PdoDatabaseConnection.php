<?php
namespace App\Parts\Database;
use App\Parts\Database\IDatabaseConnection;
use PDO;


class PdoDatabaseConnection implements IDatabaseConnection {

    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var null
     */
    private static $instance = null;

    /**
     * PdoDatabaseConnection constructor.
     */
    private function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=planet', 'root', '');
        }catch (\Exception $exception){
            print_r($exception);
        }
        }

    /**
     * @return PdoDatabaseConnection|mixed|null
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
     * @return mixed|PDO
     */
    public function connection()
    {
        return $this->connection;
    }
}
