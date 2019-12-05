<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use Illuminate\Http\Request;
use App\Invoice;
use App\Seller;
Use App\Client;
Use App\Product;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with(['client', 'seller'])->paginate();

        return view('Invoices.index', compact('invoices'));

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
            'products' => Product::all()
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
      $invoice = new Invoice;
      $invoice->expedition_date = $request->input('expedition_date');
      $invoice->invoice_date = $request->input('invoice_date');
      $invoice->expiration_date = $request->input('expiration_date');
      $invoice->state = $request->input('state');
      $invoice->client_id = $request->input('name');
      $invoice->seller_id = $request->input('name');

      $invoice->save();

      return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
