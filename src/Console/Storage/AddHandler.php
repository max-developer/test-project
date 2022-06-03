<?php

namespace App\Console\Storage;

class AddHandler extends AbstractHandler
{
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