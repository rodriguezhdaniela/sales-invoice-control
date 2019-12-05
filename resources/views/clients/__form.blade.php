<div class="row">
    <div class="col form-group">
            <label for="type_id">{{__('Type ID')}} </label>
            <select class="form-control" name="type_id" id="type_id"  value="{{ old('type_id') }}">
                <option value="Card ID" selected>Card ID</option>
                <option value="Foreign ID">Foreign ID</option>
                <option value="Passport">Passport</option>
                <option value="Other">Other</option>
            </select>
            @includeWhen($errors->has('type_id'), 'partials.__invalid_feedback', ['feedback' => $errors->first('city')])
        </div>

    <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{ __('personal ID') }}</label>
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
                <label for="address">{{ __('Address') }}</label>
                <input type="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" value="{{ old('address', $client->address) }}" required>
                @includeWhen($errors->has('address'), 'partials.__invalid_feedback', ['feedback' => $errors->first('address')])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="phone_number">{{ __('Phone_number') }}</label>
                <input type="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" name="phone_number" id="phone_number" value="{{ old('phone_number', $client->phone_number) }}" required>
                @includeWhen($errors->has('phone_number'), 'partials.__invalid_feedback', ['feedback' => $errors->first('phone_number')])
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="e_mail">{{ __('Email') }}</label>
                <input type="email" class="form-control {{ $errors->has('e_mail') ? 'is-invalid' : '' }}" name="e_mail" id="e_mail" value="{{ old('e_mail', $client->e_mail) }}" required>
                @includeWhen($errors->has('e_mail'), 'partials.__invalid_feedback', ['feedback' => $errors->first('e_mail')])
            </div>
        </div>
    </div>
</div>
