<?php
namespace App\Services;

use ReflectionClass;
use App\Core\Database\Attributes\OneToMany;
use App\Core\Database\Attributes\BelongsTo;
use App\Core\Hydrator\Hydrator;
use PDO;

class EagerLoad {
    public function __construct(private PDO $db, private Hydrator $hydrator) {}

    public function eagerLoad(array $entities, array $parentIds, string $relationName, ReflectionClass $reflection) {
        $prop = $reflection->getProperty($relationName);
        if ($attr = $prop->getAttributes(OneToMany::class)[0] ?? null) {
            $this->handleOneToMany($entities, $parentIds, $prop, $attr->newInstance());
        } 
        elseif ($attr = $prop->getAttributes(BelongsTo::class)[0] ?? null) {
            $this->handleBelongsTo($entities, $prop, $attr->newInstance());
        }
    }
    
    private function handleOneToMany($entities, $parentIds, $prop, $attr) {
        $targetRef = new ReflectionClass($attr->entity);
        $targetTable = strtolower($targetRef->getShortName()) . "s";
        
        $placeholders = implode(',', array_fill(0, count($parentIds), '?'));
        $sql = "SELECT * FROM {$targetTable} WHERE {$attr->fergienKey} IN ($placeholders)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($parentIds);
        $childrenData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $grouped = [];
        foreach ($childrenData as $row) {
            $childObj = new $attr->entity();
            $this->hydrator->hydrate($childObj, $row);
            $grouped[$row[$attr->fergienKey]][] = $childObj;
            
        }

        foreach ($entities as $id => $parent) {
            $prop->setValue($parent, $grouped[$id] ?? []);
        }
    }

    private function handleBelongsTo($entities, $prop, $attr) {
        $foreignIds = array_filter(array_unique(array_map(function($e) use ($attr) {
            $ref = new ReflectionClass($e);
            $p = $ref->getProperty($attr->foreignKey);
            return $p->getValue($e);
        }, $entities)));

        if (empty($foreignIds)) return;

        $targetRef = new ReflectionClass($attr->entity);
        $targetTable = strtolower($targetRef->getShortName()) . "s";

        $placeholders = implode(',', array_fill(0, count($foreignIds), '?'));
        $stmt = $this->db->prepare("SELECT * FROM {$targetTable} WHERE id IN ($placeholders)");
        $stmt->execute(array_values($foreignIds));
        
        $relatedData = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $obj = new $attr->entity();
            $this->hydrator->hydrate($obj, $row);
            $relatedData[$row['id']] = $obj;
        }

        foreach ($entities as $entity) {
            $ref = new ReflectionClass($entity);
            $p = $ref->getProperty($attr->foreignKey);
            $fkValue = $p->getValue($entity);
            
            if (isset($relatedData[$fkValue])) {
                $prop->setValue($entity, $relatedData[$fkValue]);
            }
        }
    }
}