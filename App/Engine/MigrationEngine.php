<?php
namespace App\Engine;
use App\Core\Database\Attributes\Column;
use ReflectionClass;

class MigrationEngine {
    public function __construct(private \PDO $db) {}

    public function run(array $classes) {
        foreach($classes as $className) {
            $sql = $this->generateSQL($className);
            $this->db->exec($sql);
        }
    }

    private function generateSQL(string $fullClassName): string {
        $reflection = new ReflectionClass($fullClassName);
        $tableAttr = $reflection->getAttributes(Table::class);
        $tableName = !empty($tableAttr) ? $tableAttr[0]->newInstance()->name : strtolower($reflection->getShortName()) . "s";

        $sql = "CREATE TABLE IF NOT EXISTS `$tableName` (\n";
        $columns = [];

        foreach ($reflection->getProperties() as $property) {
            $attrs = $property->getAttributes(Column::class);
            foreach ($attrs as $attr) {
                $col = $attr->newInstance();
                $line = "  `{$col->name}` {$col->type}";
                if ($col->type === 'VARCHAR') $line .= "({$col->length})";
                if ($col->type === 'DECIMAL') $line .= "({$col->m},{$col->d})";
                if ($col->primaryKey) $line .= " PRIMARY KEY AUTO_INCREMENT";
                if (!$col->nullable && !$col->primaryKey) $line .= " NOT NULL";
                $columns[] = $line;
            }
        }
        return $sql . implode(",\n", $columns) . "\n) ENGINE=InnoDB;";
    }
}