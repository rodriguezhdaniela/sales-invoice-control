@extends('layouts.app')

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
                    <td><strong>Code</strong></td>
                    <td><strong>Expedition date</strong></td>
                    <td><strong>Expiration date</strong></td>
                    <td><strong>Client ID</strong></td>
                    <td><strong>Client</strong></td>
                    <td><strong>Seller ID</strong></td>
                    <td><strong>Seller</strong></td>
                    <td><strong>Total</strong></td>
                    <td><strong>state</strong></td>
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

