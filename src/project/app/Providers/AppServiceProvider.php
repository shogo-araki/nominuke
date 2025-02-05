<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\FetchDataRepositoryInterface;
use App\Repositories\S3ClientRepository;
use App\Services\S3GetDataService;
use App\Services\GetDataServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            FetchDataRepositoryInterface::class,
            S3ClientRepository::class,
        );

        $this->app->bind(
            GetDataServiceInterface::class,
            function($app){
                return new S3GetDataService(
                    $app->make(FetchDataRepositoryInterface::class)
                );
            }
        );
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
