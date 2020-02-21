<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dnetix\Redirection\PlacetoPay;

class AuthenticationPtoPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton(PlacetoPay::class, function($app){

           return new PlacetoPay(config('services.authentication'));
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
