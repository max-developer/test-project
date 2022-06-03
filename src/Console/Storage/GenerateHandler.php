<?php

namespace App\Console\Storage;

use App\Storage\StorageInterface;

class GenerateHandler extends AbstractHandler
{
    public function __invoke(array $arguments)
    {
        for ($i = 0; $i < 100; $i++) {
            $this->storage->set("key-{$i}", "val-{$i}");
        }
        echo "Данные сгенерированы\n";
    }
}