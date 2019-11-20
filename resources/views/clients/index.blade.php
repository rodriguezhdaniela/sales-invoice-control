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
                        <td>{{$client->type_identity}}</td>
                        <td>{{$client->personal_id}}</td>
                        <td>{{$client->name}} {{$client->last_name}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->phone_number}}</td>
                        <td>{{$client->e_mail}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

