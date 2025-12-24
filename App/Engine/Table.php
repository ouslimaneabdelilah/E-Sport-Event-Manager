<?php
#[Attribute(Attribute::TARGET_CLASS)]
namespace App\Engine;
class Table{
    public function __construct(public string $name)
    {}
}