<?php

namespace App\Console\Storage;


class DumpHandler extends AbstractHandler
{
    public function __invoke(array $arguments)
    {
        var_dump($this->storage->all());
    }
}