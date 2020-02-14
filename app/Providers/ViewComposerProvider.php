<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composer\CachedCitiesList;
use App\Http\View\Composer\CachedCountriesList;
use App\Http\View\Composer\CachedStatesList;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


        //Compose a list of cities
        view::composer(
            'clients.__form', CachedCitiesList::class
        );

        //Compose a list of countries
        view::composer(
            'clients.__form', CachedCountriesList::class
        );

        //Compose a list of states
        view::composer(
            'clients.__form', CachedStatesList::class
        );

    }
}
