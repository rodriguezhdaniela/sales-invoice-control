<div class="row">
    <div class="col form-group">
            <label for="type_id">{{__('Type ID')}} </label>
            <select class="custom-select" name="type_id" id="type_id" value="{{ old('type_id', $client->type_id) }}">
                <option value="Card ID" selected>Card ID</option>
                <option value="Foreign ID">Foreign ID</option>
                <option value="Passport">Passport</option>
                <option value="NIT">NIT</option>
                <option value="Other">Other</option>
            </select>
            @includeWhen($errors->has('type_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('type_id')])
        </div>

    <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{ __('Personal ID') }}</label>
                <input type="text" class="form-control {{ $errors->has('personal_id') ? 'is-invalid' : '' }}" name="personal_id" id="personal_id" value="{{ old('personal_id', $client->personal_id) }}" required>
                @includeWhen($errors->has('personal_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('personal_id')])
            </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $client->name) }}" required>
            @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name">{{ __('Last name') }}</label>
            <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" id="last_name" value="{{ old('last_name', $client->last_name) }}" required>
            @includeWhen($errors->has('last_name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('last_name')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="phone_number">{{ __('Phone number') }}</label>
            <input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" name="phone_number" id="phone_number" value="{{ old('phone_number', $client->phone_number) }}" required>
            @includeWhen($errors->has('phone_number'), 'partials.__invalid_feedback', ['feedback' => $errors->first('phone_number')])
        </div>
    </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                @includeWhen($errors->has('email'), 'partials.__invalid_feedback', ['feedback' => $errors->first('email')])
            </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" value="{{ old('address', $client->address) }}" required>
            @includeWhen($errors->has('address'), 'partials.__invalid_feedback', ['feedback' => $errors->first('address')])
        </div>
    </div>

    <div class="col-md-6 form-group">
        <label for="country_id">{{ __('Country') }}</label>
        <select type="country_id" name="country_id" id="country_id" class="custom-select {{ $errors->has('country_id') ? 'is-invalid' : '' }}" required>
            <option value="">Select country</option>
            @foreach ($countries as $country)
                <option value="{{  $country->id }}" {{ old('country_id', $country->id) == $country->id ? 'selected' : '' }}> {{ $country->country }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('country_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('country_id')])
    </div>

    <div class="col-md-6 form-group">
        <label for="state_id">{{ __('State') }}</label>
        <select type="state_id" name="state_id" id="state_id" class="custom-select {{ $errors->has('state_id') ? 'is-invalid' : '' }}" required>
            <option value="">Select state</option>
            @foreach ($states as $state)
                <option value="{{  $state->id }}" {{ old('state_id', $state->id) == $state->id ? 'selected' : '' }}> {{ $state->state }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('state_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('state_id')])
    </div>

    <div class="col-md-6 form-group">
        <label for="city_id">{{ __('City') }}</label>
        <select type="city_id" name="city_id" id="city_id" class="custom-select {{ $errors->has('city_id') ? 'is-invalid' : '' }}" required>
            <option value="">Select state</option>
            @foreach ($cities as $city)
                <option value="{{  $city->id }}" {{ old('city_id', $state->id) == $state->id ? 'selected' : '' }}> {{ $city->city }}
                </option>
            @endforeach
        </select>
        @includeWhen($errors->has('city_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('city_id')])
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="postal_code">{{ __('Postal Code') }}</label>
            <input type="text" class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}" name="postal_code" id="postal_code" value="{{ old('postal_code', $client->postal_code) }}" required>
            @includeWhen($errors->has('postal_code'), 'partials.__invalid_feedback', ['feedback' => $errors->first('postal_code')])
        </div>
    </div>
</div>

