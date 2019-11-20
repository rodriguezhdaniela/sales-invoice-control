@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>New invoice</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/sales_invoices">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/sales_invoices" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id">Invoice number:</label>
                    <input type="text" class="form-control" id="invoice_number" name="invoice_number" placeholder="Invoice's number">
                    <label for="expedition_date">Expedition date:</label>
                    <input type="datetime-local" class="form-control" id="expedition_date" name="expedition_date" placeholder="Expedition date">
                    <label for="invoice_date">Invoice date:</label>
                    <input type="datetime-local" class="form-control" id="invoice_date" name="invoice_date" placeholder="invoice date">
                    <label for="expiration_date">Expiration date:</label>
                    <input type="date" class="form-control" id="expiration_date" name="expiration_date" placeholder="Expiration date">
                    <label for="iva">IVA:</label>
                    <input type="number" class="form-control" id="iva" name="iva" placeholder="IVA">
                    <label for="total">Total:</label>
                    <input type="number" class="form-control" id="total" name="total" placeholder="Total">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
