<?php
namespace App\Core\Database;
abstract class Database{
   private static Database $instance = null;
   private \PDO $connexion;
   private string $username = "root";
   private string $host = "localhost";
   private string $db_name = "esport_db";
   private string $password = "";
   private function __construct()
   {
        $this->connexion = new \PDO("mysql:host={$this->host};dbname={$this->db_name}",
            $this->username,
            $this->password);
   }
   public static function getInstance(){
    if(self::$instance === null) self::$instance = new Database();
    return self::$instance;
   }

   public function gatConnection(){
    return $this->connexion;
   }
}
?>