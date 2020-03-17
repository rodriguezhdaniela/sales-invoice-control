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
                                    @foreach($clients as $value)
                                        <option value="{{ $value->id }}" {{ $value->id == request()->input('search.clients') ? 'selected' : ''}}>
                                            {{ $value->fullname }}
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
                        @can('invoices.create')
                        <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#downloadModal">
                            <i class="fas fa-download"></i> {{ __('Download') }}
                        </button>
                        @endcan
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
                                        @can('invoices.show')
                                            <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-link">
                                                <i class="fas fa-eye"></i>{{__('View')}}
                                            </a>
                                        @endcan
                                        @can('invoices.edit')
                                            <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-link">
                                                <i class="fas fa-edit"></i>{{__('Edit')}}
                                            </a>
                                            @endcan
                                            @can('invoices.destroy')
                                                <button type="button" class="btn btn-link text-danger" data-route="{{ route('invoices.destroy', $invoice) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                                                    <i class="fas fa-trash"></i>{{__('Delete')}}
                                                </button>
                                            @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $invoices->appends(['search.clients', 'search.seller', 'search.status', 'search.expiration_date', 'search.expedition_date'])->links() }}
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('Download') }}</h4>
                    <hr>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>{{__('With filters')}}</h5>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#downloadFilterModal">
                                <i class="fas fa-download"></i> {{ __('Download') }}
                            </button>
                        </div>
                    </div>
                    <hr>
                    <h5>{{__('Without filters')}}</h5>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('excel') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> {{__( 'XLSX')}}</a>
                            <a href="{{ route('csv') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> {{__( 'CSV')}}</a>
                            <a href="{{ route('tsv') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> {{__( 'TSV')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="downloadFilterModal" tabindex="-1" role="dialog" aria-labelledby="downloadFilterModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('Download filter') }}</h4>
                    <hr>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method='GET' action="{{ route('invoices.excel')}}">
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
                        <div class="row">
                            <div class="form-group col">
                                <label for="extension">{{__('Extension')}}</label>
                                <select name="extension" id="extension" class="custom-select">
                                    <option value=""></option>
                                    <option value="xslx" {{ 'xlsx' == request()->input('extension') ? 'selected' : ''}}>{{__('XLSX')}}</option>
                                    <option value="csv" {{ 'csv' == request()->input('extension') ? 'selected' : ''}}>{{__('CSV')}}</option>
                                    <option value="tsv" {{ 'tsv' == request()->input('extension') ? 'selected' : ''}}>{{__('TSV')}}</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-download"></i> {{ __('Download') }}</button>
                        <a href="{{route('invoices.index')}}" class="btn btn-secondary btn-block"><i class="fas fa-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </form>
                </div>
                </div>
                </div>
            </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush


