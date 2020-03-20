<?php


namespace App\Actions;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateInvoiceAction extends Action
{
    public function storeModel(Model $invoice, Request $request): Model
    {
        $invoice->expiration_date = $request->input('expiration_date');
        $invoice->client_id = $request->input('client_id');
        $invoice->seller_id = $request->input('seller_id');

        $invoice->save();

        return $invoice;
    }
}
