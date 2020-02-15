<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\Http\Requests\DetailStoreRequest;
use Illuminate\Http\Response;


class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return Response|void
     */
    public function create(Invoice $invoice)
    {
        $excludedIds = $invoice->products()->get(['products.id'])->pluck('id')->toArray();
        return response()->view('invoices.details.create', [
                'invoice' => $invoice,
                'products' => Product::whereNotIn('id', $excludedIds)->get(),
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
        $product = Product::find($request->input('product_id'));
        $invoice->products()->attach($product, $request->validated());

        $productsPrice = $product->price * $request->quantity;
        $tax = $productsPrice * .19;

        $invoice->amount += $productsPrice;
        $invoice->tax += $tax;
        $invoice->total += $productsPrice + $tax;

        $invoice->save();


        return redirect()->route('invoices.show', $invoice)->withSuccess(__('Detail created successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return Response
     */
    public function destroy(Invoice $invoice, $id)
    {
        $product = $invoice->products()->findOrFail($id);
        $quantity = $product->pivot->quantity;

        $productsPrice = $product->price * $quantity;
        $tax = $productsPrice * .19;

        $invoice->amount -= $productsPrice;
        $invoice->tax -= $tax;
        $invoice->total -= $productsPrice + $tax;

        $invoice->products()->detach($product);

        $invoice->save();


        return redirect()->route('invoices.show', $invoice)->withSuccess(__('Detail deleted sucessfully'));
    }

}
