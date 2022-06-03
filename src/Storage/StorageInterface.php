<?php

namespace App\Storage;

interface StorageInterface
{
    public function set(string $key, string $value): bool;

    public function delete(string $key): bool;

    public function all(): array;
}