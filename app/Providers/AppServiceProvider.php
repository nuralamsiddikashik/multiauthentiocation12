<?php

namespace App\Providers;

use App\Repositories\Admin\AdminAuthRepository;
use App\Repositories\Admin\AdminAuthRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->bind(
            AdminAuthRepositoryInterface::class,
            AdminAuthRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
    }
}
