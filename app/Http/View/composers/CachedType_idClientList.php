<?php

namespace App\Http\View\Composers;

use App\client;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedType_idClientList
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client->type_id = $client;
    }

    public function compose(View $view)
    {
        $view->with('type_id', Cache::remember('type_id', 600, function () {
            return $this->client->type_id;
        }));
    }
}
