<?php

namespace App\Console;

use App\Storage\StorageInterface;

class DeleteHandler
{
    private StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    protected function validate(array $arguments): void
    {
        if (empty($arguments)) {
            throw new \Exception('Необходимо указать ключ');
        }
        if (count($arguments) > 1) {
            throw new \Exception('Слишком много аргументов');
        }
    }

    public function __invoke(array $arguments)
    {
        $this->validate($arguments);
        $this->storage->delete(...$arguments);
        echo "Данные удалены\n";
    }
}