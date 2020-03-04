@extends('layouts.app')

@section('content')
    <div class="card card-default">
        @include('partials.__alerts')
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">{{ __('Roles')}}</h5>
            <div>
                <div class="btn-group btn-group-sm">
                    <a href="{{route('roles.index')}}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>{{__('Name')}}</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th>{{__('Permissions')}}</th>
                        <td>@if(!empty($rolePermissions))
                            @foreach($rolePermissions as $rolePermission)
                                <label class="label label-success">{{ $rolePermission->name }},</label>
                            @endforeach
                        @endif</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer"></div>
@endsection
