<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $user->name) }}" required>
    @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
</div>
<hr>
<h4>{{ __('Role List') }}</h4>
<div class="form-group">
    @foreach($roles as $role)
        <div class="col-md-6">
            <div class="checkbox">
                <label><input type="checkbox" name = "role[]" value="{{ $role->id }}"
                              @isset($user->id)
                              @if($user->roles->contains($role->id)) checked = checked @endif
                        @endisset>{{ $role->name }}</label>
            </div>
        </div>
    @endforeach
</div>



