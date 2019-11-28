@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Seller {{ $seller->name }} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/sellers">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/sellers/{{ $seller->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
