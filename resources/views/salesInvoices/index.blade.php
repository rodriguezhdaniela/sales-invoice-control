@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Invoices</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/sales_invoices/create">Create a new invoice</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <td>Code</td>
                    <td>Expedition date</td>
                    <td>Expiration date</td>
                    <td>Client ID</td>
                    <td>Client</td>
                    <td>Seller ID</td>
                    <td>Seller</td>
                    <td>Total</td>
                    <td>state</td>
                </tr>
               @foreach($salesInvoices as $saleInvoice)
                    <tr>
                        <td>{{ $saleInvoice->invoice_date }}</td>
                        <td>{{ $saleInvoice->expiration_date }}</td>
                        <td>{{ $saleInvoice->IVA }}</td>
                        <td>{{ $saleInvoice->total }}</td>
                        <td><a href="/sales_invoices/{{ $saleInvoice->id }}/edit">Edit</a></td>
                        <td><a href="/sales_invoices/{{ $saleInvoice->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

