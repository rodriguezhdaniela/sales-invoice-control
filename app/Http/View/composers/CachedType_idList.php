<?php

namespace App\Http\View\Composers;

use App\seller;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedType_idList
{
    private $seller;

    public function __construct(Seller $seller)
    {
        $this->seller->type_id = $seller;
    }

    public function compose(View $view)
    {
        $view->with('type_id', Cache::remember('type_id.enabled', 600, function () {
            return $this->seller->type_id;
        }));
    }
}
