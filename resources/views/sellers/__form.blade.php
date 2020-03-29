<div class="row">
    <div class="col form-group">
            <label for="type_id">{{__('Type ID')}} </label>
            <select class="custom-select" name="type_id" id="type_id"  value="{{ old('type_id') }}">
                <option value="Card ID" selected>Card ID</option>
                <option value="Foreign ID">Foreign ID</option>
                <option value="Passport">Passport</option>
                <option value="Other">Other</option>
            </select>
            @includeWhen($errors->has('type_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('type_id')])
        </div>

    <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{ __('Personal ID') }}</label>
                <input type="text" class="form-control {{ $errors->has('personal_id') ? 'is-invalid' : '' }}" name="personal_id" id="personal_id" value="{{ old('personal_id', $seller->personal_id) }}" required>
                @includeWhen($errors->has('personal_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('personal_id')])
            </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $seller->name) }}" required>
            @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name">{{ __('Last name') }}</label>
            <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" id="last_name" value="{{ old('last_name', $seller->last_name) }}" required>
            @includeWhen($errors->has('last_name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')])
        </div>
    </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="address">{{ __('Address') }}</label>
                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" value="{{ old('address', $seller->address) }}" required>
                @includeWhen($errors->has('address'), 'partials.__invalid_feedback', ['feedback' => $errors->first('address')])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="phone_number">{{ __('Phone number') }}</label>
                <input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" name="phone_number" id="phone_number" value="{{ old('phone_number', $seller->phone_number) }}" required>
                @includeWhen($errors->has('phone_number'), 'partials.__invalid_feedback', ['feedback' => $errors->first('phone_number')])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ old('email', $seller->email) }}" required>
                @includeWhen($errors->has('email'), 'partials.__invalid_feedback', ['feedback' => $errors->first('email')])
            </div>
        </div>
    </div>
