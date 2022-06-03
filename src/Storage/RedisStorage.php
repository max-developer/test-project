<?php

namespace App\Storage;

use Redis;

class RedisStorage implements StorageInterface
{
    private string $host;
    private int $port;
    private int $ttl;

    private ?Redis $connection = null;

    public function __construct(string $host, int $port, int $ttl)
    {
        $this->host = $host;
        $this->port = $port;
        $this->ttl = $ttl;
    }

    public function set(string $key, string $value): bool
    {
        return $this->getConnection()->set($key, $value, $this->ttl);
    }

    public function delete(string $key): bool
    {
        return $this->getConnection()->del($key);
    }

    public function all(): array
    {
        $keys = $this->getConnection()->keys('*');
        if (empty($keys)) {
            return [];
        }

        $values = $this->getConnection()->mGet($keys);
        if (empty($values)) {
            return [];
        }

        return array_combine($keys, $values);
    }

    public function getConnection(): Redis
    {
        if ($this->connection === null) {
            $this->connection = new Redis();
            $this->connection->pconnect($this->host, $this->port);
        }
        return $this->connection;
    }

    public static function makeFromArray(array $config): self
    {
        return new static(
            $config['host'] ?? 'localhost',
            $config['port'] ?? 6379,
            $config['ttl'] ?? 3600,
        );
    }
}