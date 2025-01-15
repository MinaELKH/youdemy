<?php
namespace config ;
use PDO ;
USE PDOException ;
class Database
{
    private $connection;
    private static $instance = null; // Instance PDO pour éviter plusieurs connexions

    private $host = 'localhost';
    private $dbname = 'youdemy_croise'; 
    private $username = 'root';
    private $password = ''; 

    private function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
           die("Erreur de connexion à la base de données : " . $e->getMessage());
            exit();
        }
    }

    
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function getConnection()
    {
        return $this->connection;
    }

  
}





