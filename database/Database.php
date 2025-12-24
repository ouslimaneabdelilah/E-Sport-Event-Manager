<?php
class Database{
   private static $instance = null;
   private $connexion;
   private $username = "root";
   private $host = "localhost";
   private $db_name = "esport_db";
   private $password = "";
   private function __construct()
   {
        $this->connexion = new PDO("mysql:host={$this->host};dbname={$this->db_name}",
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