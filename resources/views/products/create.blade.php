@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Sold Products</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/products">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/products" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product_id">ID Product:</label>
                    <input type="text" class="form-control" id="product_id" name="product_id" placeholder="ID product">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="description">
                    <label for="unit_price">Unit price:</label>
                    <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="unit_price">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="amount">
                    <label for="IVA">IVA:</label>
                    <input type="number" class="form-control" id="IVA" name="IVA" placeholder="IVA">
                    <label for="total">Total:</label>
                    <input type="number" class="form-control" id="total" name="total" placeholder="Total">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
