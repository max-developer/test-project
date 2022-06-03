#!/usr/bin/php

<?php

include_once __DIR__ . '/vendor/autoload.php';

$config = include_once __DIR__ . '/config/storage.php';

$router = new \App\Support\Console\Router();

try {
    $storage = $config['class']::makeFromArray($config);

    $router
        ->add('redis', 'add', new \App\Console\AddHandler($storage))
        ->add('redis', 'delete', new \App\Console\DeleteHandler($storage));

    $router->run(array_slice($argv, 1));
} catch (Throwable $e) {
    echo $e->getMessage() . PHP_EOL;
}