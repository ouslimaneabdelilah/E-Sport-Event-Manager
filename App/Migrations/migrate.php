<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database\Database;
use App\Engine\MigrationEngine;

$db = Database::getInstance()->gatConnection();
$migrationEngine = new MigrationEngine($db);

$modelsDirectory = __DIR__ . '/App/Models';
$namespace = "App\\Models\\";
$models = [];

if (is_dir($modelsDirectory)) {
    $files = glob($modelsDirectory . '/*.php');

    foreach ($files as $file) {
        $className = basename($file, '.php');
        $fullClassName = $namespace . $className;

        if (class_exists($fullClassName)) {
            $models[] = $fullClassName;
        }
    }
}

try {
    $migrationEngine->run($models);
    echo "Done.\n";
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}