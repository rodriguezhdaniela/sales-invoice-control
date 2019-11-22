@extends('layouts.base')

@section('content')
    <div class=”row”>
        <div class="col">
            <h1>Clients</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/clients/create">Create a new client</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->type_id}}</td>
                        <td><a href="/clients/{{ $client->id }}">{{ $client->personal_id }}</a></td>
                        <td>{{$client->name}} {{$client->last_name}}</td>
                        <td><a href="/clients/{{ $client->id }}/edit">Edit</a></td>
                        <td><a href="/clients/{{ $client->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

