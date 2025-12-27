<?php
namespace App\Core\Database\Attributes;
use Attribute;
#[Attribute(Attribute::TARGET_PROPERTY)]

class BelongsTo {
    public function __construct(
        public string $entity,
        public string $foreignKey
    ) {}
}
