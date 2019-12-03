<?php

namespace App\Http\Controllers;

use App\Product;
use App\saleInvoice;
use App\seller;
Use App\client;
use App\Http\Request\SaleInvoiceRequest;
use Illuminate\Http\Request;

class saleInvoiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesInvoices = SaleInvoice::all();

        return view('salesInvoices.index', compact('salesInvoices'));
    }

    //$salesInvoices = saleInvoice::with(['client','seller'])->paginate();

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesInvoices.create', [
            'saleInvoice' => new saleInvoice,
            'clients' => Client::all(),
            'sellers' => Seller::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        $SaleInvoice = new SaleInvoice;
        $SaleInvoice->invoice_number = $request->input('invoice_number');
        $SaleInvoice->invoice_date = $request->input('invoice_date');
        $SaleInvoice->expiration_date = $request->input('expiration_date');
        $SaleInvoice->invoice_state = $request->input('invoice_state');
        $SaleInvoice->client_id = $request->input('name');
        $SaleInvoice->seller_id = $request->input('name');
        $SaleInvoice->product_id = $request->input('name');
        $SaleInvoice->product_id = $request->input('description');
        $SaleInvoice->product_id = $request->input('unit_price');



        $salesInvoices = SaleInvoice::all();

        return view('salesInvoices.index', compact('salesInvoices'));




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SaleInvoice $saleInvoice)
    {
        $saleInvoice->load('client','seller','product', 'invoice_state');

        return view('saleInvoice.show')->withSaleinvoce($saleinvoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('saleInvoice.edit', compact('saleInvoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleInvoice $saleInvoice)
    {
        $saleInvoice->client_id = $request->input('client');
        $saleInvoice->seller_id = $request->input('seller');
        $saleInvoice->invoice_date =
        $saleInvoice->expiration_date = $saleInvoice->

        $saleInvoice->save();

        return redirect()->route('saleInvoice.index')->withSuccess(__('saleInvoice created succesfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleInvoice $saleInvoice)
    {
        $saleInvoice->delete();

        return redirect()->route('saleInvoice.index')->withSuccess(__('saleInvoice created succesfully'));
    }








}
