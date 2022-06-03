#!/usr/bin/php

<?php

include_once __DIR__ . '/vendor/autoload.php';

$config = include_once __DIR__ . '/config/storage.php';

$router = new \App\Support\Console\Router();

try {
    $storage = $config['class']::makeFromArray($config);

    $router
        ->add('redis', 'add', new \App\Console\Storage\AddHandler($storage))
        ->add('redis', 'delete', new \App\Console\Storage\DeleteHandler($storage))
        ->add('redis', 'dump', new \App\Console\Storage\DumpHandler($storage))
        ->add('redis', 'generate', new \App\Console\Storage\GenerateHandler($storage));

    $router->run(array_slice($argv, 1));
} catch (Throwable $e) {
    echo $e->getMessage() . PHP_EOL;
}