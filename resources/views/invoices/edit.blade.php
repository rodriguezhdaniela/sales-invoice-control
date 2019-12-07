@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h4 class="card-title">{{ __('Edit invoice') }} {{ $invoice->id }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('invoices.update', $invoice) }}" id="invoices-form">
                @csrf
                @method('PATCH')
                @include('invoices.__form')
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoices.index', $invoice) }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="invoices-form">
                <i class="fas fa-edit"></i> {{ __('Update') }}
            </button>
        </div>
    </div>
@endsection

