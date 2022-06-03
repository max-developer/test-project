<?php

namespace App\Support\Http;

class Request
{
    private array $server;

    public function __construct(array $server)
    {
        $this->server = $server;
    }

    public function getUri(): string
    {
        return trim($this->server['REQUEST_URI'] ?? '', '/');
    }

    public function getMethod(): string
    {
        return strtoupper($this->server['REQUEST_METHOD'] ?? '');
    }
}