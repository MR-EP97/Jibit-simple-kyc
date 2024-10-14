<?php

namespace App\Providers;

use App\Interfaces\Repository\CacheRepositoryInterface;
use App\Interfaces\Repository\ProfileRepositoryInterface;
use App\Repository\CacheRepository;
use App\Repository\ProfileRepository;
use App\Services\CacheService;
use App\Services\ProfileService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(CacheRepositoryInterface::class, CacheRepository::class);
        $this->app->bind(CacheService::class, function ($app) {
            return new CacheService($app->make(CacheRepository::class));
        });

        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(ProfileService::class, function ($app) {
            return new ProfileService($app->make(ProfileRepository::class));
        });

        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
