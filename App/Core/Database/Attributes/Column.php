<?php
namespace App\Core\Database\Attributes;
use Attribute;
#[Attribute(Attribute::TARGET_PROPERTY)]

class Column{
    public function __construct(
        public string $name,
        public string $type,
        public int $length = 255,
        public bool $nullable = false,
        public bool $primaryKey = false,
        public bool $foreignkey = false,
        public int $m = 10,
        public int $d = 2,
        
    )
    {}
}