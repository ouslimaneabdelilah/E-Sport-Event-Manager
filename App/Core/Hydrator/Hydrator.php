<?php

namespace App\Core\Hydrator;

use ReflectionClass;

class Hydrator
{

    public function hydrate(object $object, array $data): object
    {
        $reflection = new ReflectionClass($object);
        foreach ($data as $key => $value) {
            $methodName = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if ($reflection->hasMethod($methodName)) {
                $object->$methodName($value);
            }
        }
        return $object;
    }
}
