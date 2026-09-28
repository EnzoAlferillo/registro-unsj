<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\AnimalServiceInterface;
use App\Services\FileAnimalService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Vincula la interfaz con la persistencia en archivos
        $this->app->bind(
            AnimalServiceInterface::class,
            FileAnimalService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}