<?php

namespace App\Core\Database;

use App\Core\Database\Attributes\Column;
use App\Core\Database\EntityInterface;
use App\Services\EagerLoad;
use App\Core\Hydrator\Hydrator;
use App\Engine\Table;
use ReflectionClass;
use PDO;
use Reflection;

class EntityManager implements EntityInterface
{
    private PDO $db;
    private EagerLoad $eg;
    private Hydrator $hydrator;

    public function __construct(PDO $db, EagerLoad $eg, Hydrator $hydrator)
    {
        $this->db = $db;
        $this->eg = $eg;
        $this->hydrator = $hydrator;
    }



    public function findAll(string $className, array $with = [])
    {
        $reflection = new ReflectionClass($className);
        $tableName = strtolower($reflection->getShortName()) . "s";

        $stmt = $this->db->prepare("SELECT * FROM {$tableName}");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entities = [];
        $ids = [];

        foreach ($results as $row) {
            $entity = new $className();
            $this->hydrator->hydrate($entity, $row);
            $entities[$row['id']] = $entity;
            $ids[] = $row['id'];
        }

        if (empty($entities)) return [];

        foreach ($with as $relationName) {
            $this->eg->eagerLoad($entities, $ids, $relationName, $reflection);
        }
        return array_values($entities);
    }


    public function save(object $obj)
    {
        $reflection = new \ReflectionClass($obj);
        $tableName = strtolower($reflection->getShortName()) . "s";
        $props = $reflection->getProperties();

        $columns = [];
        $params = [];
        $values = [];

        foreach ($props as $prop) {
            $name = $prop->getName();
            $attributes = $prop->getAttributes(Column::class);

            if (empty($attributes)) {
                continue;
            }

            $columnAttr = $attributes[0]->newInstance();
            $dbColumnName = $columnAttr->name;

            $value = $prop->getValue($obj);

            if ($name !== 'id' && $value !== null) {
                $columns[] = $dbColumnName;
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
        $reflection = new \ReflectionClass($obj);
        $tableName = strtolower($reflection->getShortName()) . "s";
        $props = $reflection->getProperties();

        $params = [];
        $values = [];
        $id = null;

        foreach ($props as $prop) {
            $name = $prop->getName();
            $attributes = $prop->getAttributes(Column::class);

            if (empty($attributes)) {
                continue;
            }

            $columnAttr = $attributes[0]->newInstance();
            $dbColumnName = $columnAttr->name;

            $value = $prop->getValue($obj);

            if ($name === 'id') {
                $id = $value;
            } elseif ($value !== null) {
                $params[] = "$dbColumnName = ?";
                $values[] = $value;
            }
        }

        if ($id === null) return false;

        $values[] = $id;
        $sql = "UPDATE {$tableName} SET " . implode(", ", $params) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($values);
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
