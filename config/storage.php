<?php

return [
    'class' => \App\Storage\RedisStorage::class,
    'host' => 'redis',
    'port' => 6379,
    'ttl' => 3600,
];