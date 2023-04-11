<div class="{{ $detail['cssClass'] }}">
    <label for="{{ $colname }}" class="form-label">@lang('site.' . $colname)</label>
    <input type="{{ $detail['type'] }}" name="{{ $colname }}"
        class="form-control @error($colname) is-invalid @enderror"
        value="{{ isset($row) ? $row->$colname : (isset($detail['data']) ? $detail['data'] : old($colname)) }}"
        {{ $detail['attr'] }} placeholder="{{ $detail['placeholder'] }}">

    @error($colname)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
