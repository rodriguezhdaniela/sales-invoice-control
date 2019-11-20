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
               {{--@foreach($salesInvoices as $saleInvoice)
                    <tr>
                        <td>{{ $saleInvoice->invoice_date }}</td>
                        <td>{{ $saleInvoice->expiration_date }}</td>
                        <td>{{ $saleInvoice->IVA }}</td>
                        <td>{{ $saleInvoice->total }}</td>
                    </tr>
                @endforeach--}}
            </table>
        </div>
    </div>
@endsection
