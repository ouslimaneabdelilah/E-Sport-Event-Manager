<?php
namespace App\Engine;
use Attribute;
#[Attribute(Attribute::TARGET_CLASS)]
class Table{
    public function __construct(public string $name)
    {}
}