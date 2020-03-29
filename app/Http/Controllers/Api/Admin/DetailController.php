<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailStoreRequest;
use App\Invoice;
use App\Product;


class DetailController extends Controller
{

    public function index(Invoice $invoice)
    {
        $details = $invoice->products;

        return response()->json($details);
    }


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

        return response()->json($invoice->products);
    }
}
