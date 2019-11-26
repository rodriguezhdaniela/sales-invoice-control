@extends('layouts.app')

@section('content')
    <div class=”row”>
        <div class="col">
            <h1>Products</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/products/create">Create a new product</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td><a href="/products/{{ $product->id }}/edit">Edit</td>
                        <td><a href="/products/{{ $product->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
