<?php

namespace App\Http\View\Composers;

use App\invoice;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedStatusList
{
    private $invoice;

    public function __construct(invoice $invoice)
    {
        $this->invoices->status = $status;
    }

    public function compose(View $view)
    {
        $view->with('status', Cache::remember('status.enabled', 600, function () {
            return $this->invoices->status;
        }));
    }
}
