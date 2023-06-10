<?php

namespace App\Providers;

use App\Services\DatawarehouseService;
use App\Services\Implement\DatawarehouseServiceImplement;
use App\Services\Implement\PopulationServiceImplement;
use App\Services\PopulationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PopulationService::class, function(Application $app){
            return $app->make(PopulationServiceImplement::class);
        });
        $this->app->singleton(DatawarehouseService::class, function(Application $app){
            return $app->make(DatawarehouseServiceImplement::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
