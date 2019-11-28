@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Product {{ $product->name }}</h1>
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
            <form action="/products/{{ $product->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="product_id">ID Product:</label>
                    <input type="text" class="form-control" id="product_id" name="product_id" placeholder="ID product" value="{{ $product->product_id }}">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value=" {{ $product->name }}">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="description" value=" {{ $product->description }}">
                    <label for="unit_price">Unit Price:</label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price" placeholder="Unit Price" value="{{ $product->Unit_price}}">
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
