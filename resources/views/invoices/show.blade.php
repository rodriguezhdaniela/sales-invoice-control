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
                @if($invoice->status == 'paid')
                @else
                <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-secondary">
                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                </a>
                <button type="button" class="btn btn-danger" data-route="{{ route('invoices.destroy', $invoice) }}" data-toggle="modal" data-target="#confirmDeleteModal">
                    <i class="fas fa-trash"></i> {{ __('Delete') }}
                </button>
                @endif
            </div>
        </div>
    </div>
     <div class="card-body">
                <dl class="row">
                    <dt class="col-md-3">{{ __('Expedition date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->created_at->toDateString() }}</dd>

                    <dt class="col-md-3">{{ __('Received date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->updated_at->toDateString() }}</dd>

                    <dt class="col-md-3">{{ __('Expiration date') }}</dt>
                    <dd class="col-md-3">{{ $invoice->expiration_date }}</dd>

                    <dt class="col-md-3">{{ __('Status') }}</dt>
                    <dd class="col-md-3">{{ $invoice->status }}</dd>
                </dl>

                <div class="card" >
                    <h5 class="card-header">{{ __('Clients') }}</h5>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">{{ __('Full name') }}</dt>
                            <dd class="col-md-3">{{ $invoice->client->fullname }}</dd>

                            <dt class="col-md-3">{{ $invoice->client->type_id }}</dt>
                            <dd class="col-md-3"> {{ $invoice->client->personal_id }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="card mt-3">
                    <h5 class="card-header">{{ __('Seller') }}</h5>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">{{ __('Full name') }}</dt>
                            <dd class="col-md-3">{{ $invoice->seller->fullname }}</dd>

                            <dt class="col-md-3">{{ $invoice->seller->type_id }}</dt>
                            <dd class="col-md-3"> {{ $invoice->seller->personal_id }}</dd>
                        </dl>
                    </div>
                </div>

         <div class="card card-default mt-3">
             <div class="card-header d-flex justify-content-between">
                 <h5 class="card-title mb-0"> {{__('Details')}}</h5>


                 @if($invoice->total == 0)
                     <div>
                         <div class="btn-group btn-group-sm">
                             <a href="{{ route('details.create', $invoice) }}" class="btn btn-secondary">
                                 <i class="fas fa-plus"></i> {{ __('Add product') }}
                             </a>
                         </div>
                     </div>
                 @elseif($invoice->status == 'paid')
                 @else
                 <div>
                     <div class="btn-group btn-group-sm">
                         <a href="{{ route('details.create', $invoice) }}" class="btn btn-secondary">
                             <i class="fas fa-plus"></i> {{ __('Add product') }}
                         </a>
                         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                             <i class="fas fa-money-bill-wave-alt"></i> {{ __('Pay Invoice') }}
                         </button>
                     </div>
                 </div>
                 @endif
             </div>
             <div class="container">
                 <table class="table">
                     <thead>
                     <tr>
                         <th scope="col" class="text-center">{{__('ID')}}</th>
                         <th scope="col" class="text-center">{{__('Name')}}</th>
                         <th scope="col" class="text-center">{{__('Description')}}</th>
                         <th scope="col" class="text-center">{{__('Price')}}</th>
                         <th scope="col" class="text-center">{{__('Quantity')}}</th>
                         <th scope="col" class="text-center">{{__('Amount')}}</th>
                         <th scope="col" class="text-center"></th>
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
                             @if($invoice->status == 'paid')
                             @else
                             <td class="td-button">
                                 <div class="btn-group btn-group-sm">
                                     <button type="button" class="btn btn-link text-danger" data-route="{{ route('details.destroy', [$invoice, $product]) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                                         <i class="fas fa-trash"></i> Delete
                                     </button>
                                 </div>
                             </td>
                            @endif
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
                         </tr>
                         <tr>
                             <th scope="row">{{ __('IVA (19%)') }}</th>
                             <td>{{ number_format($invoice->tax) }}</td>
                         </tr>
                         <tr>
                             <th scope="row">{{ __('Total') }}</th>
                             <td colspan="2">{{ number_format($invoice->total) }}</td>
                         </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="card mt-3">
             <h5 class="card-header">{{ __('Payment history') }}</h5>
             <div class="card-body">
                 <table class="table">
                     <thead>
                     <tr>
                         <th scope="col">{{__('Reference')}}</th>
                         <th scope="col">{{__('Date')}}</th>
                         <th scope="col">{{__('Status')}}</th>
                         <th scope="col">{{__('Action')}}</th>
                     </tr>
                     </thead>
                     <tbody>

                     @foreach($paymentAttempts as $paymentAttempt)

                         @if($paymentAttempt->invoice_id === $invoice->id)

                            <tr>
                                <th scope="row">{{$paymentAttempt->requestId}}</th>
                                <td>{{$paymentAttempt->created_at->isoFormat('Y-MM-DD')}}</td>
                                <td>{{$paymentAttempt->status}}</td>
                                <td>
                                    <a href={{$paymentAttempt->processUrl}}>See details</a>
                                </td>
                            </tr>
                         @endif
                     @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
<div class="card-footer d-flex justify-content-center"></div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('Payment confirmation') }}</h4>
                    <hr>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h5 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">{{__('Client')}}</span>
                        </h5>

                        <div class="row d-flex justify-content-between align-items-center mb-3">
                            <div class="col">{{ $invoice->client->fullname }}</div>
                            <div class="col">{{ $invoice->client->type_id }}</div>
                            <div class="col">{{ $invoice->client->personal_id }}</div>
                        </div>
                        <br>
                    </div>
                    @foreach($invoice->products as $product)
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $product->name }}</h6>
                                    <p>{{ $product->quantity }}</p>
                                </div>
                                <span class="text-muted"></span>
                                <span class="text-muted">${{ number_format($product->price * $product->pivot->quantity) }}</span>
                            </li>
                        @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Subtotal</strong>
                                <strong>${{ number_format($invoice->amount)  }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>IVA</strong>
                                <strong>{{ number_format($invoice->tax) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total (COP)</strong>
                                <strong>${{ number_format($invoice->total) }}</strong>
                            </li>
                        </ul>
                        <h4 >
                    <hr>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        </div>
                        <div>
                            <form action="{{ route('payment', $invoice) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success" >{{__('Make payment')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
        @include('partials.__confirm_payment_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush
