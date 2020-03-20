<?php

namespace App\Http\Controllers\Api\Admin;

use App\Actions\StoreDetailsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\DetailStoreRequest;
use App\Invoice;


class DetailController extends Controller
{


    public function store(DetailStoreRequest $request, Invoice $invoice, StoreDetailsAction $action)
    {
        return $action->execute($invoice, $request);
    }

    
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return __('The Invoice was successfully deleted');
    }
}
