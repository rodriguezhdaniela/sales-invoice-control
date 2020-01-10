<div class="modal fade" tabindex="-1" role="dialog" id="detailsInvoice">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Sold product') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="col form-row">
                        <label for="name">{{ __('Product') }}</label>
                        <select type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                            <option value="">Select product</option>
                            @foreach ($products as $product)
                                <option value="{{  $product->id }}" {{ old('product_id', $product->product_id) == $product->id ? 'select' : '' }}> {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @includeWhen($errors->has('product'), 'partials.__invalid_feedback', ['feedback' => $errors->first('product')])
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="quantity">{{__('Quantity')}} </label>
                            <input type="number" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantity" name="quantity" value="{{ old('quantity', $invoice->quantity) }}" required>
                            @includeWhen($errors->has('quantity'), 'partials.__invalid_feedback', ['feedback' => $errors->first('quantity')])
                        </div>
                    </div>
                </div>
                <form id="detailsInvoice" action="" method="post">
                    @csrf()
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-success" data-dismiss="modal">{{ __('Save') }}</button>
            </div>
        </div>
    </div>
</div>
