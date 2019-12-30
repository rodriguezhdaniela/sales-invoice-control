@extends('layouts.app')

@section('content')
<div class="card card-default">
    @include('partials.__alerts')
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">{{ __('Sale Invoice n°') }} {{ $invoice->id }}</h5>
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
<<<<<<< HEAD
     <div class="card-body">
                <dl class="row">
                    <dt class="col-md-3">{{ __('Expedition date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->created_at->toDateString() }}</dd>

                    <dt class="col-md-3">{{ __('Received date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->updated_at->toDateString() }}</dd>
=======
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
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232

                        <dt class="col-md-3">{{ __('Expiration date') }}</dt>
                        <dd class="col-md-3">{{ $invoice->expiration_date }}</dd>

                        <dt class="col-md-3">{{ __('Status') }}</dt>
                        <dd class="col-md-3">{{ $invoice->state }}</dd>
                    </dl>

<<<<<<< HEAD
                    <dt class="col-md-3">{{ __('Status') }}</dt>
                    <dd class="col-md-3">{{ $invoice->status }}</dd>
                </dl>

                <div class="card" >
                    <h5 class="card-header">{{ __('Client') }}</h5>
                    <div class="card-body">
                        <dl class="row">
=======
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
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232
                            <dt class="col-md-3">{{ __('Full name') }}</dt>
                            <dd class="col-md-3">{{ $invoice->seller->name }}</dd>

                            <dt class="col-md-3">{{ $invoice->seller->type_id }}</dt>
                            <dd class="col-md-3"> {{ $invoice->seller->personal_id }}</dd>
                        </dl>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="card mt-3">
                    <h5 class="card-header">{{ __('Seller') }}</h5>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">{{ __('Full name') }}</dt>
                            <dd class="col-md-3">{{ $invoice->seller->name }}</dd>

                            <dt class="col-md-3">{{ $invoice->seller->type_id }}</dt>
                            <dd class="col-md-3"> {{ $invoice->seller->personal_id }}</dd>
                        </dl>
                    </div>
                </div>

         <div class="card card-default mt-3">
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
             <div class="container">
                 <div class="col-lg-5 col-sm-4 ml-auto">
                     <table class="table table-hover">
                         <tbody>
                         <tr>
                             <th scope="row">{{ __('Subtotal') }}</th>
                             <td class="right">{{ number_format($invoice->amount)  }}</td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <th scope="row">{{ __('IVA (19%)') }}</th>
                             <td>{{ number_format($invoice->tax) }}</td>
                             <td></td>
                             <td></td>
                         </tr>
                         <tr>
                             <th scope="row">{{ __('Total') }}</th>
                             <td colspan="2">{{ number_format($invoice->total) }}</td>
                             <td></td>
                         </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
=======
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
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232
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
