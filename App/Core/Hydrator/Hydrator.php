<?php
namespace App\Core\Hydrator;

use ReflectionClass;

class Hydrator {

    public function hydrate(object $object, array $data): object {
        $reflection = new ReflectionClass($object);

        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if ($reflection->hasMethod($methodName)) {
                $method = $reflection->getMethod($methodName);
                $method->invoke($object, $value);
            }
        }

        return $object;
    }
}