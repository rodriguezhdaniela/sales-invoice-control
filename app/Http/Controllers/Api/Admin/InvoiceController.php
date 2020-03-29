<?php


namespace App\Http\Controllers\Api\Admin;


use App\Actions\StoreInvoiceAction;
use App\Actions\UpdateInvoiceAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Invoice;


class InvoiceController extends Controller
{
    public function index()
    {
        return Invoice::all();
    }


    public function store(InvoiceStoreRequest $request, Invoice $invoice, StoreInvoiceAction $action)
    {
        return $action->execute($invoice, $request);
    }


    public function update(InvoiceUpdateRequest $request, Invoice $invoice, UpdateInvoiceAction $action)
    {
        return $action->execute($invoice, $request);
    }

    public function show(Invoice $invoice)
    {
        return $invoice;
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response()->json(__('The Invoice was successfully deleted'));
    }
}
