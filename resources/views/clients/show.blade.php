@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Client {{ $client->name }} {{ $client->last_name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/clients">Back</a>
        </div>
    </div>
    <div class="row">
        Details...
    </div>
@endsection
