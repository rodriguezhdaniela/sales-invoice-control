@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title mb-0">Invoices</h3>
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary btn-sm" href="{{ route('invoices.create') }}"><i class="fas fa-plus"></i> Create</a>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-light justify-content-lg-end">
                <form method='GET' action="{{ route('invoices.index')}}" class="form-inline">
                    <select name="type" class="form-control mr-sm-2"  id="ControlSelect">
                        <option>Search by type</option>
                        <option>Expedition date</option>
                        <option>Expiration date</option>
                        <option>Client</option>
                        <option>Seller</option>
                        <option>Total</option>
                        <option>State</option>
                    </select>

                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search">

                    <div class="btn-group-sm">
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
                    </div>
                </form>
            </nav>
        <table class="table">
            <thead>
            <tr>
                <th>Expedition date</th>
                <th>Expiration date</th>
                <th>Client</th>
                <th>Seller</th>
                <th>Total</th>
                <th>State</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->expedition_date }}</td>
                    <td>{{ $invoice->expiration_date }}</td>
                    <td>{{ $invoice->client->name }}</td>
                    <td>{{ $invoice->seller->name }}</td>
                    <td></td>
                    <td>{{ $invoice->state }}</td>
                    <td class="text-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-link">
                                <i class="fas fa-eye"></i> view
                            </a>
                            <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-link">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" class="btn btn-link text-danger" data-route="{{ route('invoices.destroy', $invoice) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-center">
        {!! $invoices->render() !!}
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush


