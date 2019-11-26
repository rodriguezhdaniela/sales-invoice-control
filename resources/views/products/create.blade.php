@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>New Product</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/products">Back</a>
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
            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="form-group">
                    <label for="product_id">ID Product:</label>
                    <input type="text" class="form-control" id="product_id" name="Product_id" placeholder="ID product" value="{{ old('product_id') }}">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="Description" placeholder="description" value="{{ old('description') }}">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
