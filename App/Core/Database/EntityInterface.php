<?php
namespace App\Core\Database;
interface EntityInterface{
    public function save(object $obj);
    public function update(object $obj);
    public function delete(int $id,string $className);
    public function findAll(string $className);
    public function find(int $id,string $className);
    // public function serch(string $query, string $className);
    
}