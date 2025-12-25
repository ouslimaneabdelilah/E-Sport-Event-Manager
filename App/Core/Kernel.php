<?php

namespace App\Core;
use App\Views\Menu;
use App\Core\Database\Database;
use App\Core\Container\ServiceContainer;
use App\Core\Resolver\Resolver;

class Kernel
{
    public function handle()
    {
        $container = ServiceContainer::getInstance();
        $db = Database::getInstance()->gatConnection();
        $container->set(\PDO::class, $db);
        $resolver = new Resolver();
        $menu = $resolver->resolve(Menu::class);
        $menu->start();
    }
}
