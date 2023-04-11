<div class="form-group {{ $detail['cssClass'] }}">
    <label for="exampleInputEmail1">{{ __('site.' . $colname) }}</label>
    <input type="email" name="email" class="form-control @error($colname) parsley-error @enderror"
        id="exampleInputEmail1" placeholder="{{ __('site.' . $colname) }}"
        value="{{ isset($row) ? $row->email : old('email') }}">

    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
</div>
