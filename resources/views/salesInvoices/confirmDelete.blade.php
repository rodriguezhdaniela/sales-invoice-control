@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Sale Invoice {{ $saleInvoice->code }} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/sales_invoices">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/sales_invoices/{{ $client->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
