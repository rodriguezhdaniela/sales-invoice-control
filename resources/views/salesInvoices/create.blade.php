@extends('layouts.app')

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
                    <label for="invoice_date">Invoice date received:</label>
                    <input type="datetime-local" class="form-control" id="invoice_date" name="invoice_date" placeholder="invoice date">
                    <label for="expiration_date">Expiration date:</label>
                    <input type="date" class="form-control" id="expiration_date" name="expiration_date" placeholder="Expiration date">

                    <label for="personal_id" class="form-control">Seller</label>

                    <h4>Seller</h4>
                    <select type="text" name="seller_id" id="personal_id" class="form-control">
                        <option value="">Select Client</option>
                        @foreach($sellers as $seller)
                            <option value="{{ $seller->personal_id }}">{{ $seller->personal_id }}
                                {{ $seller->name }}
                            </option>
                        @endforeach
                    </select>

                    <label for="personal_id">ID Number:</label>
                    <input type="text" class="form-control" id="personal_id" name="personal_id" placeholder="personal_id" value="{{ old('personal_id') }}">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                    <label for="last_name">Last Name:</label>
                    <h4>Client</h4> <a class="btn btn-secondary" href="/clients/create">Create new Client</a>
                    <label for="personal_id">ID Number:</label>
                    <input type="text" class="form-control" id="personal_id" name="personal_id" placeholder="personal_id" value="{{ old('personal_id') }}">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                    <label for="last_name">Last Name:</label>

                    <h4>Sold products</h4>
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                    <label for="valor">valor:</label>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="name" value="{{ old('name') }}">
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
