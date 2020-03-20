<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StoreDetailsAction extends Action
{
    public function storeModel(Model $invoice, Request $request): Model
    {
        $invoice->product->id = $request->input('product_id');
        $invoice->pivot->quantity = $request->input('quantity');

        $invoice->save();

        return $invoice;
    }
}
