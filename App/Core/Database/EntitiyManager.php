<?php
namespace App\Core\Database;
abstract class EntitiyManager{
    protected \PDO $db;
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function save($obj){
        $reflection = new \ReflectionClass($obj);
        $tableName = strtolower($reflection->getName()). "s";
        $props = $reflection->getProperties();
        $columns = [];
        $values = [];
        $params = [];
        foreach($props as $prop){
            $name = $prop->getName();
            $value = $prop->getValue($obj);
            if($name !=='id' && $value !==null){
                $columns[] = $name;
                $values[] = $value;
                $params[] = "?";
            }
        }
        $sql = "INSERT INTO {$tableName} (".implode(",", $columns) .") VALUES (". implode(",",$params). ")";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($values);
    }
}

?>