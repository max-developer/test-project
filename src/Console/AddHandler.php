<?php

namespace App\Console;

use App\Storage\StorageInterface;

class AddHandler
{
    private StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    protected function validate(array $arguments): void
    {
        if (count($arguments) != 2) {
            throw new \Exception('Необходимо указать ключ и значение');
        }
    }

    public function __invoke(array $arguments)
    {
        $this->validate($arguments);
        $this->storage->set(...$arguments);
        echo "Данные сохранены\n";
    }
}