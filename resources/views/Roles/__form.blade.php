<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $role->name) }}" required>
    @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
</div>
<hr>
<h4>{{ __('Permission list') }}</h4>
<div class="form-group">
    @foreach($permissions as $permission)
        <div class="col-md-6">
            <div class="checkbox">
                <label><input type="checkbox" name = "permission[]"  value="{{ old('$permission', $permission->id) }}"
                              @isset($role->id)
                                @if($role->permissions->contains($permission->id)) checked = checked @endif
                        @endisset >{{ $permission->name }}</label>
            </div>
        </div>
    @endforeach
</div>
