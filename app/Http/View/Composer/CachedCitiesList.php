<?php


namespace App\Http\View\Composer;

use App\City;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedCitiesList
{
    private $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function compose(View $view)
    {
        $view->with('cities', Cache::remember('cities.enabled', 600, function () {
            return $this->city->all();
        }));
    }
}
