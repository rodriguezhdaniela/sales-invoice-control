@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h4 class="card-title">{{ __('Edit User') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user) }}" id="products-form">
                @csrf
                @method('PATCH')
                @include('users.__form')
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('users.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="products-form">
                <i class="fas fa-edit"></i> {{ __('Update') }}
            </button>
        </div>
    </div>
@endsection
