<?php

namespace App\Core\Database;

use App\Core\Database\EntityInterface;
use App\Core\Hydrator\Hydrator;
use ReflectionClass;
use PDO;

class EntityManager implements EntityInterface
{
    private PDO $db;
    private Hydrator $hydrator;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->hydrator = new Hydrator();
    }

    public function save(object $obj)
    {
        $reflection = new ReflectionClass($obj);
        $tableName = strtolower($reflection->getShortName()) . "s";
        $props = $reflection->getProperties();
        
        $columns = [];
        $params = [];
        $values = [];

        foreach ($props as $prop) {    
            $name = $prop->getName();
            $value = $prop->getValue($obj);

            if ($name !== 'id' && $value !== null) {
                $columns[] = $name;
                $values[] = $value;
                $params[] = "?";
            }
        }

        $sql = "INSERT INTO {$tableName} (" . implode(",", $columns) . ") VALUES (" . implode(", ", $params) . ")";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($values);
    }

    public function update(object $obj)
    {
        $reflection = new ReflectionClass($obj);
        $tableName = strtolower($reflection->getShortName()) . "s";
        $props = $reflection->getProperties();
        
        $params = [];
        $values = [];
        $id = null;

        foreach ($props as $prop) {         
            $name = $prop->getName();
            $value = $prop->getValue($obj);

            if ($name === 'id') {
                $id = $value;
            } elseif ($value !== null) {
                $params[] = "$name = ?";
                $values[] = $value;
            }
        }

        if ($id === null) return false;

        $values[] = $id;
        $sql = "UPDATE {$tableName} SET " . implode(", ", $params) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($values);
    }

    public function findAll(string $className)
    {
        $reflection = new ReflectionClass($className);
        $tableName = strtolower($reflection->getShortName()) . "s";
        
        $stmt = $this->db->prepare("SELECT * FROM {$tableName}");
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entities = [];

        foreach ($results as $row) {
            $entity = new $className();
            $this->hydrator->hydrate($entity, $row);
            $entities[] = $entity;
        }
        var_dump($entities);
        return $entities;
    }

    public function delete(int $id, string $className)
    {
        $reflection = new ReflectionClass($className);
        $tableName = strtolower($reflection->getShortName()) . "s";
        $stmt = $this->db->prepare("DELETE FROM {$tableName} WHERE id = ?");
        return $stmt->execute([$id]);
    }

        public function find($id, $className)
    {
        $refelction = new \ReflectionClass($className);
        $tableName = strtolower($refelction->getShortName()) . "s";
        $stmt = $this->db->prepare("SELECT * FROM {$tableName} WHERE id = ?");
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}