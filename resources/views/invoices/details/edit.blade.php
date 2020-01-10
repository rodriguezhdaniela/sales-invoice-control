@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h4 class="card-title">{{ __('Edit Sold Product') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('details.update', [$invoice, $product]) }}"  class="form-group" method="POST" id="detail-form">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col form-group">
                        <div class="col form-row">
                            <label for="product_id">{{ __('Product') }}</label>
                            <select type="text" id="product_id" name="product_id" class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" required>
                                <option value="">Select product</option>
                                @foreach ($products as $product)
                                    <option value="{{  $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}> {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @includeWhen($errors->has('product_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('product_id')])
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="quantity">{{__('Quantity')}} </label>
                                <input type="number" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantity" name="quantity" value="{{ old('quantity', $invoice->quantity) }}" required>
                                @includeWhen($errors->has('quantity'), 'partials.__invalid_feedback', ['feedback' => $errors->first('quantity')])
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="form-group">
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="detail-form">
                <i class="fas fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div>
@endsection
