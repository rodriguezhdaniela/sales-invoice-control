@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{__('Products')}}</h5>
            <div class="btn-group-sm">
                <a class="btn btn-primary btn-sm" href="{{ route('products.create') }}"><i class="fas fa-plus"></i>{{__('Create')}}</a>
            </div>
        </div>
        <div class="container">
            @include('partials.__alerts')
            <nav class="navbar navbar-light justify-content-lg-end">
                <form method='GET' action="{{ route('products.index')}}" class="form-inline">
                    <input type="text" class="form-control mr-sm-2" name="name" placeholder="Name" value="{{ request()->input('name') }}">
                    <input type="text" class="form-control mr-sm-2" name="description" placeholder="Description" value="{{request()->input('description')}}">
                    <div class="btn-group-sm">
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
                    </div>
                </form>
            </nav>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('Unit Price')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-link text-secondary">
                                        <i class="fas fa-edit"></i>{{__('Edit')}}
                                    </a>
                                    <button type="button" class="btn btn-link text-danger" data-route="{{ route('products.destroy', $product) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                                        <i class="fas fa-trash"></i>{{__('Delete')}}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div class="mt-3 d-flex justify-content-center">
                {{ $products->appends(['name', 'description'])->links() }}
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
