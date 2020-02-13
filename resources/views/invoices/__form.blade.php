<div class="row">
        <div class="col form-group">
            <label for="expedition_date">{{__('Expedition date')}} </label>
            <input type="text" class="form-control" name="expedition_date" id="expedition_date" value="{{ now()->toDateString() }}" disabled>
            @includeWhen($errors->has('expedition_date'), 'partials.__invalid_feedback', ['feedback' => $errors->first('expedition_date')])
        </div>

    <div class="col form-group">
        <label for="expiration_date">{{ __('Expiration date') }}</label>
        <input type="date" class="form-control {{ $errors->has('expiration_date') ? 'is-invalid' : '' }}" name="expiration_date" id="expiration_date" value="{{ old('expiration_date', $invoice->expiration_date ?? now()->addDays(30)->toDateString()) }}" required>
        @includeWhen($errors->has('expiration_date'), 'partials.__invalid_feedback', ['feedback' => $errors->first('expiration_date')])
    </div>
</div>

<div class="row">
    <div class="col form-group">
    <label for="status">{{__('Status')}} </label>
    @if($invoice->status)
        <select id="status" name="status"  class="custom-select {{ $errors->has('status') ? 'is-invalid' : '' }}" required>
            <option value="">Select State</option>
            <option value="new" {{ old( 'status', $invoice->status) == "new" ? 'selected' : ''}}>New</option>
            <option value="received" {{ old( 'status', $invoice->status) == "received" ? 'selected' : ''}}>Received</option>
            <option value="paid" {{ old( 'status', $invoice->status) == "paid" ? 'selected' : ''}}>Paid</option>
            <option value="cancelled" {{ old( 'status', $invoice->status) == "cancelled" ? 'selected' : ''}}>Cancelled</option>
        </select>
        @includeWhen($errors->has('state'), 'partials.__invalid_feedback', ['feedback' => $errors->first('state')])
    @else
            <input class="form-control" type="text" name="status" id="status" value="New" disabled>
    @endif
    </div>
    <div class="col form-group">
        <label for="seller_id">{{ __('Seller') }}</label>
        <select type="seller_id" name="seller_id" id="seller_id" class="custom-select {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" required>
            <option value="">Select name</option>
            @foreach ($sellers as $seller)
                <option value="{{  $seller->id }}" {{ old('seller_id', $invoice->seller_id) == $seller->id ? 'selected' : '' }}> {{ $seller->name }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('seller_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('seller_id')])
    </div>

    <div class="col form-group">
        <label for="client_id">{{ __('Clients') }}</label>
        <select type="client_id" name="client_id" id="client_id" class="custom-select {{ $errors->has('client_id') ? 'is-invalid' : '' }}" required>
            <option value="">Select name</option>
            @foreach ($clients as $client)
                <option value="{{  $client->id }}" {{ old('client_id', $invoice->client_id) == $client->id ? 'selected' : '' }}> {{ $client->name }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('client_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('client_id')])
    </div>
</div>
