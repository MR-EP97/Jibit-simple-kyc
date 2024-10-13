<?php

namespace App\Repository;

use App\Interfaces\Repository\CacheRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class CacheRepository implements CacheRepositoryInterface
{

    public function get(string $key)
    {
        return Cache::get($key);
    }

    public function put(string $key, $value, int $minutes)
    {
        return Cache::put($key, $value, $minutes);
    }

    public function forget(string $key)
    {
        return Cache::forget($key);
    }

    public function remember(string $key, int $minutes, callable $callback)
    {
        return Cache::remember($key, $minutes, $callback);
    }
}
