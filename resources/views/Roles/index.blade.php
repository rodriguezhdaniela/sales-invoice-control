@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{__('Role Management')}}</h5>
            <div class="btn-group-sm">
                @can('roles.index')
                <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}"><i class="fas fa-plus"></i>{{__('Create')}}</a>
                @endcan
            </div>
        </div>
        <div class="container">
            @include('partials.__alerts')
            <nav class="navbar navbar-light justify-content-lg-end">
                <form method='GET' action="{{ route('roles.index')}}" class="form-inline">
                    <input type="text" class="form-control mr-sm-2" name="name" placeholder="Name" value="{{ request()->input('name') }}">
                    <div class="btn-group-sm">
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
                    </div>
                </form>
            </nav>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td class="text-right">
                                    @can('roles.show')
                                        <a href="{{ route('roles.show', $role) }}" class="btn btn-link">
                                            <i class="fas fa-eye"></i>{{__('View')}}
                                        </a>
                                    @endcan
                                    @can('roles.edit')
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-link text-secondary">
                                            <i class="fas fa-edit"></i>{{__('Edit')}}
                                        </a>
                                    @endcan
                                    @can('roles.destroy')
                                        <button type="button" class="btn btn-link text-danger" data-route="{{ route('roles.destroy', $role) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                                            <i class="fas fa-trash"></i>{{__('Delete')}}
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $roles->appends(['name'])->links() }}
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
