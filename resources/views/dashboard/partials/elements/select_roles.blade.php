@if(!Route::is('dashboard.users.editProfile'))
<div class="form-group {{ $detail['cssClass'] }}">
        <label for="Input{{ $colname }}">{{__('site.'.$colname)}} *</label>
        <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example" name="roles"
            required style="padding: 0.3rem .75rem">
            <option selected disabled>@lang('site.roles')</option>
            @foreach ($roles as $index=>$role)
                <option value="{{ $index }}"
                    @if (isset($row) && $row->roles->first() != null)
                      {{ $index ==  $row->roles->first()->id ? 'selected' : '' }} 
                    @endif>
                    {{ $role }}</option>
            @endforeach
        </select>
        @error($colname)
            <span id="exampleInputPassword1-error" class="error invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
    @endif
