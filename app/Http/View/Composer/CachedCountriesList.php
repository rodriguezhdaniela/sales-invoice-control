<?php


namespace App\Http\View\Composer;

use App\Country;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedCountriesList
{
    private $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function compose(View $view)
    {
        $view->with('countries', Cache::remember('countries.enabled', 600, function () {
            return $this->country->all();
        }));
    }
}
