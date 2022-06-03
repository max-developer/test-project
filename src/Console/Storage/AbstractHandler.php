<?php

namespace App\Console\Storage;

use App\Storage\StorageInterface;

abstract class AbstractHandler
{
    protected StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }
}