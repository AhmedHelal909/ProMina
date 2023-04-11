<div class="form-group {{ $detail['cssClass'] }}">
    <label for="exampleInputPassword1">{{ __('site.' . $colname) }}</label>
    <input type="password" name="{{ $colname }}" class="form-control @error($colname) parsley-error @enderror"
        id="exampleInputPassword1" placeholder="{{ __('site.' . $colname) }}" value="">

    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
</div>
