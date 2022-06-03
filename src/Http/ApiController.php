<?php

namespace App\Http;

use App\Storage\StorageInterface;
use App\Support\Http\Response;

class ApiController
{
    private StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function index(): Response
    {
        $data = $this->storage->all();
        return new Response($data);
    }

    public function delete(array $args): Response
    {
        $this->storage->delete(...$args);
        return new Response();
    }
}