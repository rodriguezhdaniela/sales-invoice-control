@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h4 class="card-title">{{ __('New seller') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sellers.store') }}" id="sellers-form">
                @csrf
                @include('sellers.__form')
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('sellers.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="sellers-form">
                <i class="fas fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div>
@endsection

