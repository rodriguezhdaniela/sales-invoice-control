<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Invoice;
use App\Seller;
use App\Client;
use App\Product;




class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with(['client', 'seller'])->paginate(10);

        return view('invoices.index', compact('invoices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create', [
            'invoice' => new Invoice,
            'clients' => Client::all(),
            'sellers' => Seller::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InvoiceStoreRequest $request
     * @return void
     */
    public function store(InvoiceStoreRequest $request)
    {

        Invoice::create($request->validated());

        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return void
     */
    public function show(Invoice $invoice, Product $product)
    {


        return view('invoices.show', [
            'invoice' => $invoice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return void
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', [
            'invoice' => $invoice,
            'clients' => Client::all(),
            'sellers' => Seller::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InvoiceUpdateRequest $request
     * @param Invoice $invoice
     * @return void
     */
    public function update(InvoiceUpdateRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());

        return redirect()->route('invoices.show', $invoice);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return void
     * @throws \Exception
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index');
    }


}
