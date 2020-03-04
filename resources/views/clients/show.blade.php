@extends('layouts.app')

@section('content')
<div class="card card-default">
    @include('partials.__alerts')
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">{{ __('Client')}} {{$client->fullname}}</h5>
        <div>
            <div class="btn-group btn-group-sm">
                <a href="{{route('clients.index')}}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
        <table class="table">
            <tbody>
            <tr>
                <th>{{__('Personal id')}}</th>
                <td>{{$client->personal_id}}</td>
            </tr>
            <tr>
                <th>{{__('Name')}}</th>
                <td>{{$client->name}}</td>
            </tr>
            <tr>
                <th>{{__('Last Name')}}</th>
                <td>{{$client->last_name}}</td>
            </tr>
            <tr>
                <th>{{__('Email')}}</th>
                <td>{{$client->email}}</td>
            </tr>
            <tr>
                <th>{{__('Email')}}</th>
                <td>{{$client->phone_number}}</td>
            </tr>
            <tr>
                <th>{{__('Address')}}</th>
                <td>{{$client->address}}</td>
            </tr>
            <tr>
                <th>{{__('City')}}</th>
                <td>{{$client->city->city}}</td>
            </tr>
            <tr>
                <th>{{__('State')}}</th>
                <td>{{$client->state->state}}</td>
            </tr>
            <tr>
                <th>{{__('Country')}}</th>
                <td>{{$client->country->country}}</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="card-footer"></div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush
