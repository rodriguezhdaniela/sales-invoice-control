@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Client {{ $client->id }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/clients">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/clients/{{ $client->id }}" method="POST">
                @csrf
                @method('delete')

                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
