@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{__('Users')}}</h5>
        </div>
        <div class="container">
            @include('partials.__alerts')
            <nav class="navbar navbar-light justify-content-lg-end">
                <form method='GET' action="{{ route('users.index')}}" class="form-inline">
                    <input type="text" class="form-control mr-sm-2" name="name" placeholder="Name" value="{{ request()->input('name') }}">
                    <input type="text" class="form-control mr-sm-2" name="email" placeholder="Email" value="{{ request()->input('email') }}">
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
                            <th>{{__('Email')}}</th>
                            <th>{{__('Role')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $name)
                                        <label class="badge badge-success">{{ $name }}</label>
                                    @endforeach
                                    @else
                                    <label class="badge badge-success">{{__('without role')}}</label>
                                @endif
                            </td>
                            <td>
                               @can('users.edit')
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-link text-secondary">
                                        <i class="fas fa-edit"></i>{{__('Edit')}}
                                    </a>
                                @endcan
                                @can('users.edit')
                                    <button type="button" class="btn btn-link text-danger" data-route="{{ route('users.destroy', $user) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete') }}">
                                        <i class="fas fa-trash"></i>{{__('Delete')}}
                                    </button>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div class="mt-3 d-flex justify-content-center">
                {{ $users->appends(['name'])->links() }}
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
