@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">Import Invoices</h5>
        </div>
        <table class="table">
            @include('partials.__alerts')
            <div class="card-body">
                <form action="{{ route('invoices.import.excel') }}" method="POST" enctype="multipart/form-data" id="import-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" form="import-form" />
                    @if($errors->any())
                        <div class="alert alert-danger">
                            Upload Validation Error<br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="file" name="file" class="form-control" form="import-form">
                </form>
            </div>
        </table>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoices.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="import-form">
                <i class="fas fa-upload"></i> {{ __('Upload') }}
            </button>
        </div>
    </div>

@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush
