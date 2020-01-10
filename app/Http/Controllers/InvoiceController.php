<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Invoice;
use App\Seller;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use App\Exports\InvoicesExport;
use App\Imports\InvoicesImport;
use Maatwebsite\Excel\Facades\Excel;


class InvoiceController extends Controller
{
    /**
     * @param InvoicesExport $export
     * @return InvoicesExport
     */
    public function exportExcel(InvoicesExport $export)
    {
        return $export;

    }

    public function importView(){
        return view('import');
    }



    public function importExcel(Request $request) {
       $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv'
       ]);

        $file = $request->file('file')->getRealPath();
        Excel::import(new InvoicesImport(), $file);

        return back()->withSuccess(__('Invoices imported successfully'));


    }


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::select(['id', 'name'])->get();
        $sellers = Seller::select(['id', 'name'])->get();

        $invoices = Invoice::with(['client', 'seller'])
            ->ofClient($request->input('search.client'))
            ->ofSeller($request->input('search.seller'))
            ->status($request->input('search.status'))
            ->expirationDate($request->input('search.expiration_date'))
            ->expeditionDate($request->input('search.expedition_date'))
            ->paginate(10);

        return response()->view('invoices.index', compact('invoices', 'clients', 'sellers'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('invoices.create', [
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

        $invoice = Invoice::create($request->validated());

        return redirect()->route('invoices.show', $invoice)->withSuccess(__('Invoice created sucessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return void
     */
    public function show(Invoice $invoice)
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

        return redirect()->route('invoices.show', $invoice)->withSuccess(__('Invoice updated sucessfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return void
     * @throws \Exception
     */
    public function destroy(Invoice $invoice, product $product)
    {
        $invoice->products()->detach($product->id);
        $invoice->delete();

        return redirect()->route('invoices.index')->withSuccess(__('Invoice deleted sucessfully'));
    }


}
