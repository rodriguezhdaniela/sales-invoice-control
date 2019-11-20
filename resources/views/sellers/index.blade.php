@extends('layouts.base')

@section('content')
    <div class=”row”>
        <div class="col">
            <h1>Sellers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/sellers/create">Create a new seller</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                @foreach($sellers as $seller)
                    <tr>
                        <td>{{$seller->type_identity}}</td>
                        <td>{{$seller->personal_id}}</td>
                        <td>{{$seller->name}} {{$client->last_name}}</td>
                        <td>{{$seller->address}}</td>
                        <td>{{$seller->phone_number}}</td>
                        <td>{{$seller->e_mail}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
