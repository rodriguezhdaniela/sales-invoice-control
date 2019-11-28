@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Seller {{ $seller->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/sellers">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/sellers/{{ $seller->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="type_id">Type ID:</label>
                    <select  class="form-control" name="type_id" id="type_id" value="{{ old('type_id') }}">
                        <option value="Card ID" selected>Card ID</option>
                        <option value="Foreign ID">Foreign ID</option>
                        <option value="Passport">Passport</option>
                        <option value="Other">Other</option>
                    </select>
                    <label for="personal_id">ID Number:</label>
                    <input type="text" class="form-control" id="personal_id" name="personal_id" placeholder="number id" value="{{ $seller->personal_id }}">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $seller->name }}">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{ $seller->address }}">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="phone number" value="{{ $seller->phone_number }}">
                    <label for="e_mail">E-mail:</label>
                    <input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="e-mail address" value="{{ $seller->e_mail }}">
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
