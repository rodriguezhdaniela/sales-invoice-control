@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">Invoices</h5>
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary btn-sm" href="{{ route('invoices.create') }}"><i class="fas fa-plus"></i> Create</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Expedition date</th>
                <th>Expiration date</th>
                <th>Client</th>
                <th>Seller</th>
                <th>Total</th>
                <th>State</th>
                <th>State</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->expedition_date }}</td>
                    <td>{{ $invoice->expiration_date }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td>{{ $invoice->state }}</td>
                    <td class="text-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('invoices.edit', $invoices) }}" class="btn btn-link">
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
        <div class="card-footer"></div>
    </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush


