<div class="{{ $detail['cssClass'] }}">
    <label for="validationServer01" class="form-label">@lang('site.' . $colname)</label>
    <input type="{{ $detail['type'] }}" name="{{ $colname }}"
        class="form-control @error($colname) is-invalid @enderror"
        value=""
        {{ $detail['attr'] }} placeholder="{{ $detail['placeholder'] }}">

    @error($colname)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
