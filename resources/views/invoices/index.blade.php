@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3 order-md-2 mb-2">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{__('Filters')}}</h5>
                    <form method='GET' action="{{ route('invoices.index')}}">
                        <div class="row">
                            <div class="form-group col">
                                <label for="expedition_date">{{__('Expedition date')}}</label>
                                <input
                                    name="search[expedition_date]"
                                    id="expedition_date"
                                    class="form-control"
                                    type="date"
                                    value="{{ request()->input('search.expedition_date') }}">
                            </div>

                            <div class="form-group col">
                                <label for="expiration_date">{{__('Expiration date')}}</label>
                                <input
                                    name="search[expiration_date]"
                                    id="expiration_date"
                                    class="form-control"
                                    type="date"
                                    value="{{ request()->input('search.expiration_date') }}">
                            </div>

                            <div class="form-group col">
                                <label for="client">{{__('Client')}}</label>
                                <select name="search[client]" id="client" class="custom-select">
                                    <option></option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ $client->id == request()->input('search.client') ? 'selected' : ''}}>
                                            {{ $client->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="seller">{{__('Seller')}}</label>
                                <select name="search[seller]" id="seller" class="custom-select">
                                    <option></option>
                                    @foreach($sellers as $seller)
                                        <option value="{{ $seller->id }}" {{ $seller->id == request()->input('search.seller') ? 'selected' : ''}}>
                                            {{ $seller->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="status">{{__('Status')}}</label>
                                <select name="search[status]" id="status" class="custom-select">
                                    <option value=""></option>
                                    <option value="new" {{ 'new' == request()->input('search.status') ? 'selected' : ''}}>{{__('New')}}</option>
                                    <option value="received" {{ 'received' == request()->input('search.status') ? 'selected' : ''}}>{{__('Received')}}</option>
                                    <option value="paid" {{ 'paid' == request()->input('search.status') ? 'selected' : ''}}>{{__('Paid')}}</option>
                                    <option value="cancelled" {{ 'cancelled' == request()->input('search.status') ? 'selected' : ''}}>{{__('Cancelled')}}</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
                        <a href="{{route('invoices.index')}}" class="btn btn-secondary btn-block"><i class="fas fa-undo"></i> {{ __('Reset') }}
                        </a>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-9 order-md-1">
            <div class="card card-default">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">{{__('Invoice')}}s</h4>
                    <div class="btn-group-sm">
                        <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create</a>
                        {{--<a href="{{ route('invoices.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Download</a>--}}
                        <a href="{{ route('csv') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i>csv</a>
                        <a href="{{ route('txt') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i>txt</a>
                        <a href="{{ route('excel') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i>xlsx</a>
                        <a href="{{ route('import.view') }}" class="btn btn-success btn-sm"><i class="fas fa-upload"></i> Import</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        @include('partials.__alerts')
                        <thead>
                        <tr>
                            <th>{{__('Expedition date')}}</th>
                            <th>{{__('Expiration date')}}</th>
                            <th>{{__('Client')}}</th>
                            <th>{{__('Seller')}}</th>
                            <th>{{__('Tax')}}</th>
                            <th>{{__('Subtotal')}}</th>
                            <th>{{__('Total')}}</th>
                            <th>{{__('Status')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td nowrap>{{ $invoice->created_at->toDateString() }}</td>
                                <td nowrap>{{ $invoice->expiration_date }}</td>
                                <td>{{ $invoice->client->fullname }}</td>
                                <td>{{ $invoice->seller->fullname }}</td>
                                <td>{{ $invoice->tax }}</td>
                                <td>{{$invoice->amount }}</td>
                                <td>{{ $invoice->total }}</td>
                                <td>{{ $invoice->status }}</td>
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
                        {{ $invoices->appends(['search.client', 'search.seller', 'search.status', 'search.expiration_date', 'search.expedition_date'])->links() }}
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush


