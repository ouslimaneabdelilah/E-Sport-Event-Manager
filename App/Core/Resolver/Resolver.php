<?php
namespace Core\Resolver;

use Core\Container\ServiceContainer;
use ReflectionClass;

class Resolver {
    private ServiceContainer $container;

    public function __construct() {
        $this->container = ServiceContainer::getInstance();
    }

    public function resolve($className) {
        $reflector = new ReflectionClass($className);

        $constructor = $reflector->getConstructor();
        if (is_null($constructor)) {
            return new $className();
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $type = $parameter->getType();
            
            if ($type && !$type->isBuiltin()) {
                $depClassName = $type->getName();
                
                if ($this->container->has($depClassName)) {
                    $dependencies[] = $this->container->get($depClassName);
                } else {
                    $dependencies[] = $this->resolve($depClassName);
                }
            }
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}