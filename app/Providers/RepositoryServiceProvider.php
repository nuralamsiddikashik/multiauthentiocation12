<?php

namespace App\Providers;

use App\Repositories\Admin\AdminAuthRepository;
use App\Repositories\Admin\AdminAuthRepositoryInterface;
use App\Repositories\User\UserAuthRepository;
use App\Repositories\User\UserAuthRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register(): void {
        $this->app->singleton(
            AdminAuthRepositoryInterface::class,
            AdminAuthRepository::class
        );

        $this->app->singleton(
            UserAuthRepositoryInterface::class,
            UserAuthRepository::class
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {
        //
    }
}
