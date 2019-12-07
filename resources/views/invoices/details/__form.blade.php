<div class="row">
<div class="col form-group">

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
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="button" id="detail-modal" class="btn btn-primary">Save</button>
</div>
</div>












div class="row">
        <div class="col form-group">
            <label for="expedition_date">{{__('Expedition date')}} </label>
            <input type="datetime-local" class="form-control {{ $errors->has('expedition_date') ? 'is-invalid' : '' }}" name="expedition_date" id="expedition_date" value="{{ old('expedition_date', $invoice->expedition_date) }}" required>
            @includeWhen($errors->has('expedition_date'), 'partials.__invalid_feedback', ['feedback' => $errors->first('expedition_date')])
        </div>

    <div class="col form-group">
        <label for="invoice_date">{{ __('Invoice receipt date') }}</label>
        <input type="date" class="form-control {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $invoice->invoice_date) }}" required>
        @includeWhen($errors->has('invoice_date'), 'partials.__invalid_feedback', ['feedback' => $errors->first('invoice_date')])
    </div>

    <div class="col form-group">
        <label for="expiration_date">{{ __('Expiration date') }}</label>
        <input type="date" class="form-control {{ $errors->has('expiration_date') ? 'is-invalid' : '' }}" name="expiration_date" id="expiration_date" value="{{ old('expiration_date', $invoice->expiration_date) }}" required>
        @includeWhen($errors->has('expiration_date'), 'partials.__invalid_feedback', ['feedback' => $errors->first('expiration_date')])
    </div>
</div>

<div class="row">
    <div class="col form-group">
        <label for="state">{{__('State')}} </label>
        <select type="text" id="state" name="state"  class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}"  value="{{ old('state', $invoice->state) }}" required>
            <option value="">Select State</option>
            <option value="New">New</option>
            <option value="Send">Send</option>
            <option value="Received">Received</option>
            <option value="Paid">Paid</option>
        </select>
        @includeWhen($errors->has('state'), 'partials.__invalid_feedback', ['feedback' => $errors->first('state')])
    </div>



