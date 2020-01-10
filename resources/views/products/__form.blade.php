<div class="row">
        <div class="col form-group">
            <label for="name">{{__('Name')}} </label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $product->name) }}" required>
            @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
        </div>

    <div class="col form-group">
        <label for="description">{{ __('Description') }}</label>
        <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" value="{{ old('description', $product->description) }}" required>
        @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
    </div>

    <div class="col form-group">
        <label for="price">{{ __('Price') }}</label>
        <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        @includeWhen($errors->has('price'), 'partials.__invalid_feedback', ['feedback' => $errors->first('price')])
    </div>
</div>

