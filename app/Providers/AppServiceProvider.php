<?php

namespace App\Providers;

use App\Interfaces\Repository\ProfileRepositoryInterface;
use App\Repository\ProfileRepository;
use App\Services\ProfileService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(ProfileService::class, function ($app) {
            return new ProfileService($app->make(ProfileRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
