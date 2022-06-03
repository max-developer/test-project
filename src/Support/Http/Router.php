<?php

namespace App\Support\Http;

class Router
{
    private array $routes = [];

    public function add(string $method, string $pattern, callable $callback): self
    {
        $this->routes[] = ['method' => $method, 'pattern' => $pattern, 'callback' => $callback];
        return $this;
    }

    public function run(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($request->getMethod() !== $route['method']) {
                continue;
            }
            if (preg_match($route['pattern'], $request->getUri(), $matches)) {
                $response = $route['callback'](array_slice($matches, 1));
                $this->respond($response);
                return;
            }
        }
        throw new \Exception('Route not found');
    }

    public function respond(Response $response): void
    {
        $response->sendHeaders();
        $response->sendContent();
    }
}