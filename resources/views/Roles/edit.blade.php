@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h4 class="card-title">{{ __('Edit Role') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.update', $role) }}" id="roles-form">
                @csrf
                @method('PATCH')
                @include('roles.__form')
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('roles.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="roles-form">
                <i class="fas fa-edit"></i> {{ __('Update') }}
            </button>
        </div>
    </div>
@endsection
