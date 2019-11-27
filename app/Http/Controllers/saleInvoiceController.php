<?php

namespace App\Http\Controllers;

use App\saleInvoice;
use App\seller;
Use App\client;
use App\invoiceState;
use App\productInvoice;
use Illuminate\Http\Request;

class saleInvoiceController extends Controller
{

    public function search(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->get();
        return \response()->json($posts);
    }
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
            'invoice' => new saleInvoice,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saleInvoice = new SaleInvoice;
        $saleInvoice->client_id = $request->input('client');
        $saleInvoice->seller_id = $request->input('seller');
        $saleInvoice->invoice_date =
        $saleInvoice->expiration_date =
        $saleInvoice->


        $saleInvoice->save();

        return redirect()->route('saleInvoice.index')->withSuccess(__('saleInvoice created succesfully'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SaleInvoice $saleInvoice)
    {
        $saleInvoice->load('client','seller');

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
