<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\Http\Requests\DetailStoreRequest;
use App\Http\Requests\DetailUpdateRequest;


class DetailController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return void
     */
    public function create(Invoice $invoice)
    {

        return view('invoices.details.create', [
                'invoice' => $invoice,
                'products' => Product::all(),
        ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param DetailStoreRequest $request
     * @param Invoice $invoice
     * @return void
     */
    public function store(DetailStoreRequest $request, Invoice $invoice)
    {
        $invoice->products()->attach(request('product_id'), $request->validated());


        return redirect()->route('invoices.show', $invoice);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoice)
    {
        return view('invoices.details.edit', [
            'invoice' => $invoice,
            'products' => product::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DetailUpdateRequest $request
     * @param Invoice $invoice
     * @param Product $product
     * @return void
     */
    public function update(DetailUpdateRequest $request, Invoice $invoice, Product $product)
    {
        $invoice->products()->updateExistingPivot($product->id, $request->validated());

        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice, Product $product)
    {
        $invoice->products()->detach($product->id);

        return redirect()->route('invoices.show', $invoice);
    }




}
