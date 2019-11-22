@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Seller {{ $seller->id }}</h1>
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
                @method('put')
                <div class="form-group">
                    <label for="type_id">ID Type:</label>
                    <input type="text" class="form-control" id="type_id" name="type_id" placeholder="ID Type">
                    <label for="personal_id">ID Number:</label>
                    <input type="text" class="form-control" id="personal_id" name="personal_id" placeholder="number id">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last_name">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="address">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="phone number">
                    <label for="e_mail">E-mail:</label>
                    <input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="e-mail address">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
