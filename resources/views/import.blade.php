@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">Import Invoices</h5>
        </div>
        <table class="table">
            @include('partials.__alerts')
            <div class="card-body">
                <form action="{{ route('invoices.import.excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            Upload Validation Error<br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <p>{{Session::get('message')}}</p>
                    @endif

                    <input type="file" name="file" class="form-control">
                    <input type="file" name="file" class="form-control">

                    <button type="submit" name="upload" class="btn btn-primary">{{__('Upload')}}</button>

                    <a href="{{ route('invoices.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>

                </form>
            </div>
        </table>
        <div class="card-footer"></div>
    </div>

@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush
