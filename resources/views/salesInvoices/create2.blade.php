
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
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('sales_invoices.store') }}">
                @csrf
                <div class="form-group">
                    <label for="id" class="required">Invoice number:</label>
                    <input type="text" class="form-control" id="invoice_number" name="invoice_number" placeholder="Invoice number" value="{{ old('invoice_number') }}">
                    <label for="invoice_date">Invoice date received:</label>
                    <input type="datetime-local" class="form-control" id="invoice_date" name="invoice_date" placeholder="invoice date">
                    <label for="expiration_date">Expiration date:</label>
                    <input type="date" class="form-control" id="expiration_date" name="expiration_date" placeholder="Expiration date">
                </div>
                <br />
                <div>
                    <h4>Estado</h4>
                    <label for="invoiceState" class="required"></label>
                    <select type="text" id="invoiceState" name="invoiceState"  class="form-control" placeholder="invoiceState" value="{{ old('invoiceState') }}">
                        <option value="">Select State</option>
                        <option value="new">New</option>
                        <option value="send">Send</option>
                        <option value="received">Received</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>
                <br />
                <div>
                    <h4>Seller</h4>
                    <label for="name" class="required">Name</label>
                    <select type="name" name="name" id="name" class="form-control" placeholder="name">
                        <option value="">Select seller</option>
                        @foreach ($sellers as $seller)
                            <option value="{{  $seller->id }}" {{ old('personal_id', $saleInvoice->seller_id) == $seller->id ? 'select' : '' }}> {{ $seller->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            <br/>
                <div>
                    <h4>Client</h4>
                    <label for="name" class="required">Name</label>
                    <select type="text" id="name" name="name"  class="form-control">
                        <option value="">Select client</option>
                        @foreach ($clients as $client)
                            <option value="{{  $client->id }}" {{ old('personal_id', $saleInvoice->client_id) == $seller->id ? 'select' : '' }}> {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br />
                <div>
                    <h4>Sold products</h4>
                    <label for="name" class="required">Name:</label>
                    <select type="text" id="name" class="form-control" name="name">
                        <option value="">Select product</option>
                        @foreach ($products as $product)
                            <option value="{{  $product->id }}" {{ old('product_id', $product->product_id) == $product->id ? 'select' : '' }}> {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="description" value="{{ old('description') }}">
                    <label for="Unit_price">valor:</label>
                    <input type="text" class="form-control" id=Unit_price name=Unit_price placeholder=Unit price value="{{ old('Unit_price') }}">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="{{ old('quantity') }}">
                    <label for="Amount">Amount:</label>
                    <input type="number" class="form-control" id="Amount" name="Amount" placeholder="Amount" value="{{ old('Amount') }}">
                    <label for="iva">IVA:</label>
                    <input type="number" class="form-control" id="iva" name="iva" placeholder="IVA" value="{{ old('IVA') }}">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
