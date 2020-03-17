@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h4 class="card-title">{{ __('New Role') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.store') }}" id="roles-form">
                @csrf
                @include('roles.__form')
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('roles.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="roles-form">
                <i class="fas fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div>
@endsection
