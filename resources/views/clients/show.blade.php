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
        <div class="col">
            <h3>Details</h3>
            <table class="table">
               @foreach($client as $clients)
                    <tr>
                        <td>{{ $client->type_id }}</td>
                        <td>{{ $client->personal_id }}</td>
                        <td>{{ $client->name }} {{ $client->last_name }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->phone_number }}</td>
                        <td>{{ $client->e_mail }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
