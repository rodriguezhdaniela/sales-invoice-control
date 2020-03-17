@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="card card-default">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title mb-0">{{__('Invoice')}}s</h4>
                <div class="btn-group-sm">
                    @can('invoices.create')<a href="{{ route('invoices.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create</a>
                    @endcan
                        <a href="{{ route('invoices.excel') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Download</a>
                        <a href="{{ route('csv') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i>csv</a>
                        <a href="{{ route('txt') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i>txt</a>
                        <a href="{{ route('excel') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i>xlsx</a>
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
            </div>
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


