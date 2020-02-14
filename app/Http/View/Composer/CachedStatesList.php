<?php


namespace App\Http\View\Composer;


use App\State;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedStatesList
{
    private $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function compose(View $view)
    {
        $view->with('estate', Cache::remember('states.enabled', 600, function() {
            return $this->state->all();
        }));
    }

}
