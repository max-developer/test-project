<?php

include_once __DIR__ . '/../../vendor/autoload.php';

use App\Support\Http\Response;

$config = include_once __DIR__ . '/../../config/storage.php';
$router = new \App\Support\Http\Router();

try {
    $storage = $config['class']::makeFromArray($config);
    $controller = new \App\Http\ApiController($storage);

    $router
        ->add('GET', '!^api/redis$!', [$controller, 'index'])
        ->add('DELETE', '!^api/redis/(.+)$!', [$controller, 'delete']);

    $router->run(new \App\Support\Http\Request($_SERVER));
} catch (Throwable $e) {
    $router->respond(new Response(['message' => $e->getMessage()], Response::ERROR));
}