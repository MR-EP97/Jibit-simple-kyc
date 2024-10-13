<?php

namespace App\Services;

use App\Interfaces\Repository\CacheRepositoryInterface;

class CacheService
{

    public function __construct(protected CacheRepositoryInterface $cacheRepository)
    {
    }

    public function get(string $key)
    {
        return $this->cacheRepository->get($key);
    }

    public function put(string $key, $value, int $minute = 24 * 3600)
    {
        return $this->cacheRepository->put($key, $value, $minute);
    }

    public function forget(string $key)
    {
        return $this->cacheRepository->forget($key);
    }

    public function remember(string $key, int $minutes, callable $callback)
    {
        return $this->cacheRepository->remember($key, $minutes * 60, $callback);
    }

}
