<?php

namespace App\Providers;

use App\Repositories\DatawarehouseRepository;
use App\Repositories\Implement\DatawarehouseRepositoryImplement;
use App\Repositories\Implement\PopulationRepositoryImplement;
use App\Repositories\PopulationRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PopulationRepository::class, function(Application $app){
            return $app->make(PopulationRepositoryImplement::class);
        });
        $this->app->bind(DatawarehouseRepository::class, function(Application $app){
            return $app->make(DatawarehouseRepositoryImplement::class);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
