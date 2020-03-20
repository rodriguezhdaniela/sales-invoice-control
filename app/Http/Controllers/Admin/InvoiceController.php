<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvoicesExport1;
use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Invoice;
use App\Jobs\NotifyUserOfCompletedExport;
use App\Seller;
use App\Client;
use App\Product;
use App\PaymentAttempt;
use Exception;
use Illuminate\Http\Request;
use App\Exports\InvoicesExport;
use App\Imports\InvoicesImport;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
        $user = Auth::user();
        $client = DB::table('clients')->where('personal_id', $user->personal_id)->get();

        if($user->roles[0]->name == 'Client')
        {
            if ($user->personal_id == $client[0]->personal_id)
            {
                $invoices = Invoice::with(['client', 'seller'])
                    ->where('client_id', $client[0]->id)
                    ->get();

                return response()->view('invoices.clients.index', compact('invoices', 'client'));

            }else{
                return response()->view('invoices.clients.index')->with('info', 'you have no associated invoices');
            }

        }else{

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();

        if($user->roles[0]->name == 'Seller')
        {
            $sellers = Seller::where('personal_id', $user->personal_id)
                ->get();

            return response()->view('invoices.create', [
                'invoice' => new Invoice,
                'clients' => Client::all(),
                'sellers' => $sellers
            ]);


        }else {
            return response()->view('invoices.create', [
                'invoice' => new Invoice,
                'clients' => Client::all(),
                'sellers' => Seller::all(),
            ]);
        }
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
     * @param PaymentAttempt $paymentAttempts
     * @return Response
     */
    public function show(Invoice $invoice, PaymentAttempt $paymentAttempts)
    {
        return response()->view('invoices.show', [
            'invoice' => $invoice,
            'paymentAttempts' => $paymentAttempts::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function edit(Invoice $invoice)
    {
        $user = Auth::user();

        if($user->roles[0]->name == 'Seller')
        {
            $sellers = Seller::where('personal_id', $user->personal_id)
                ->get();

            return response()->view('invoices.edit', [
                'invoice' => $invoice,
                'clients' => Client::all(),
                'sellers' => $sellers
            ]);

        }else {
            return response()->view('invoices.edit', [
                'invoice' => $invoice,
                'clients' => Client::all(),
                'sellers' => Seller::all(),
            ]);
        }

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
     * @throws Exception
     */
    public function destroy(Invoice $invoice, product $product)
    {
        $invoice->products()->detach($product->id);
        $invoice->delete();

        return redirect()->route('invoices.index')->withSuccess(__('Invoice deleted sucessfully'));
    }

    public function importView()
    {
        return view('import');
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);

        $file = $request->file('file');
        Excel::import(new InvoicesImport(), $file);

        return back()->withSuccess(__('Invoices imported successfully'));
    }

    //XLSX

    public function export(Request $request)
    {

        $invoices = Invoice::with(['client', 'seller'])
            ->ofClient($request->input('search.client'))
            ->ofSeller($request->input('search.seller'))
            ->status($request->input('search.status'))
            ->expirationDate($request->input('search.expiration_date'))
            ->expeditionDate($request->input('search.expedition_date'));

        $extension = $request->input('extension');

        if ($extension == 'xslx')
        {
            return (new InvoicesExport1($invoices))->download('invoices.xlsx');

            /*(new InvoicesExport1($invoices))->store('invoices.xlsx')
            ->chain([new NotifyUserOfCompletedExport(request()->user()),
            ]);

            return back()->withSuccess('Export started!');*/

        }elseif ($extension == 'csv')
        {
            return (new InvoicesExport1($invoices))->download('invoices.csv');

            /*(new InvoicesExport1($invoices))->store('invoices.csv')
            ->chain([new NotifyUserOfCompletedExport(request()->user()),
            ]);

            return back()->withSuccess('Export started!');*/

        }elseif ($extension == 'tsv')
        {
            return (new InvoicesExport1($invoices))->download('invoices.tsv');

            /*(new InvoicesExport1($invoices))->store('invoices.tsv')
            ->chain([new NotifyUserOfCompletedExport(request()->user()),
            ]);

            return back()->withSuccess('Export started!');*/
        }

    }

    public function exportExcel()
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }


    public function exportCSV()
    {
        return Excel::download(new InvoicesExport, 'invoices.csv');
    }

    public function exportTSV()
    {
        return Excel::download(new InvoicesExport, 'invoices.tsv');
    }
}
