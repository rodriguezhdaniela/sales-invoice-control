<div class="row">
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
        <select type="text" id="state" name="state"  class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" required>
            <option value="">Select State</option>
            <option value="New" {{ old( 'state', $invoice->state) == "New" ? 'selected' : ''}}">New</option>
            <option value="Send" {{ old( 'state', $invoice->state) == "Send" ? 'selected' : ''}}">Send</option>
            <option value="Receipt" {{ old( 'state', $invoice->state) == "Receipt" ? 'selected' : ''}}">Receipt</option>
            <option value="Paid" {{ old( 'state', $invoice->state) == "Paid" ? 'selected' : ''}}">Paid</option>
        </select>
        @includeWhen($errors->has('state'), 'partials.__invalid_feedback', ['feedback' => $errors->first('state')])
    </div>

    <div class="col form-group">
        <label for="seller_id">{{ __('Seller') }}</label>
        <select type="seller_id" name="seller_id" id="seller_id" class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" required>
            <option value="">Select name</option>
            @foreach ($sellers as $seller)
                <option value="{{  $seller->id }}" {{ old('seller_id', $invoice->seller_id) == $seller->id ? 'selected' : '' }}> {{ $seller->name }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('seller_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('seller_id')])
    </div>

    <div class="col form-group">
        <label for="client_id">{{ __('Client') }}</label>
        <select type="client_id" name="client_id" id="client_id" class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}" required>
            <option value="">Select name</option>
            @foreach ($clients as $client)
                <option value="{{  $client->id }}" {{ old('client_id', $invoice->client_id) == $client->id ? 'selected' : '' }}> {{ $client->name }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('client_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('client_id')])
    </div>
</div>
