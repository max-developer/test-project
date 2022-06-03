<?php

namespace App\Support\Console;

class Router
{
    private array $commands = [];

    public function add(string $name, string $action, callable $callback): self
    {
        $this->commands[$name][$action] = $callback;
        return $this;
    }

    public function run(array $arguments)
    {
        if (count($arguments) < 2) {
            throw new \Exception('Argument invalid');
        }

        [$name, $action] = $arguments;
        $this->runCommand($name, $action, array_slice($arguments, 2));
    }

    protected function runCommand(string $name, string $action, array $arguments)
    {
        $callback = $this->commands[$name][$action] ?? null;

        if ($callback === null) {
            throw new \Exception(sprintf('Command "%s %s" not found', $name, $action));
        }

        return $callback($arguments);
    }
}