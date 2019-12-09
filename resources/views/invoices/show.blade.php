@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title mb-0"></h4>
        <div>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                </a>

                <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-secondary">
                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                </a>

                <button type="button" class="btn btn-danger" data-route="{{ route('invoices.destroy', $invoice) }}" data-toggle="modal" data-target="#confirmDeleteModal">
                    <i class="fas fa-trash"></i> {{ __('Delete') }}
                </button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="text-center">
            <h1> {{ __('Sale Invoice n°') }} {{ $invoice->id }}</h1>
        </div>
        <div class="container">
            <div class="col-md-12">
                <div class="panel panel-default"></div>
                <hr>
            </div>
            <div class="card-body">
                <dl class="row text-center">
                    <dt class="col-md-3">{{ __('Expedition date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->expedition_date }}</dd>

                    <dt class="col-md-3">{{ __('Receipt date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->invoice_date }}</dd>

                    <dt class="col-md-3">{{ __('Expiration date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->expiration_date }}</dd>

                    <dt class="col-md-3">{{ __('Status') }}</dt>
                    <dd class="col-md-3">{{ $invoice->state }}</dd>
                </dl>

                <div class="col-md-12">
                    <div class="panel panel-default"></div>
                    <hr>
                    <div class="card-body" >
                        <div class="row">
                            <h5 class="col-mb-3"><b>{{ __('Client') }}</b></h5>
                        </div>
                        <dl class="row text-center">
                            <dt class="col-md-3">{{ __('Full name') }}</dt>
                            <dd class="col-md-3">{{ $invoice->client->name }}</dd>

                            <dt class="col-md-3">{{ $invoice->client->type_id }}</dt>
                            <dd class="col-md-3"> {{ $invoice->client->personal_id }}</dd>
                        </dl>
                    </div>
                <div class="card-body">
                    <div class="row">
                        <h5 class="col-mb-3"><b>{{ __('Seller') }}</b></h5>
                    </div>
                    <dl class="row text-center">
                        <dt class="col-md-3">{{ __('Full name') }}</dt>
                        <dd class="col-md-3">{{ $invoice->seller->name }}</dd>

                        <dt class="col-md-3">{{ $invoice->seller->type_id }}</dt>
                        <dd class="col-md-3"> {{ $invoice->seller->personal_id }}</dd>
                    </dl>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0"> Details</h4>
                    <div>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('details.create', $invoice) }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> {{ __('Add product') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice->products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-center">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->description }}</td>
                                    <td class="text-center">{{ $product->price }}</td>
                                    <td class="text-center">{{ $product->pivot->quantity }}</td>
                                    <td class="text-center">${{ number_format($product->price * $product->pivot->quantity) }}</td>
                                    <td class="td-button">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-link text-danger" data-route="{{ route('details.destroy', [$invoice, $product]) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
