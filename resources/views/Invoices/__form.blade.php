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
        <select type="text" id="state" name="state"  class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}"  value="{{ old('state', $invoice->state) }}" required>
            <option value="">Select State</option>
            <option value="new">New</option>
            <option value="send">Send</option>
            <option value="received">Received</option>
            <option value="paid">Paid</option>
        </select>
        @includeWhen($errors->has('state'), 'partials.__invalid_feedback', ['feedback' => $errors->first('state')])
    </div>

    <div class="col form-group">
        <label for="seller">{{ __('Seller') }}</label>
        <select type="seller" name="seller" id="seller" class="form-control {{ $errors->has('seller') ? 'is-invalid' : '' }}" required>
            <option value="">Select name</option>
            @foreach ($sellers as $seller)
                <option value="{{  $seller->id }}" {{ old('personal_id', $invoice->seller_id) == $seller->id ? 'select' : '' }}> {{ $seller->name }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('seller'), 'partials.__invalid_feedback', ['feedback' => $errors->first('seller')])
    </div>

    <div class="col form-group">
        <label for="client">{{ __('Client') }}</label>
        <select type="client" name="client" id="client" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
            <option value="">Select name</option>
            @foreach ($clients as $client)
                <option value="{{  $client->id }}" {{ old('personal_id', $invoice->client_id) == $client->id ? 'select' : '' }}> {{ $client->name }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('client'), 'partials.__invalid_feedback', ['feedback' => $errors->first('client')])
    </div>
</div>

