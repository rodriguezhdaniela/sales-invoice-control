@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Product {{ $product->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/products">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/products/{{ $products->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
