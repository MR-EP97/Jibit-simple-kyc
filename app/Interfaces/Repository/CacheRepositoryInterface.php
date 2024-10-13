<?php

namespace App\Interfaces\Repository;

interface CacheRepositoryInterface
{
    public function get(string $key);

    public function put(string $key, $value, int $minutes);

    public function forget(string $key);

    public function remember(string $key, int $minutes, callable $callback);
}
