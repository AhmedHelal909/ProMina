<div class="mb-3 {{ $detail['cssClass'] }}">
    <label for="{{ $colname }}" class="form-label">@lang('site.' . $colname)</label>
    <textarea name="{{ $colname }}" class="form-control @error($colname) is-invalid @enderror" id="{{ $colname }}"
        placeholder="{{ $detail['placeholder'] }}" {{ $detail['attr'] }}>{{ isset($row) ? $row->$colname : isset($detail['data']) ?? old($colname) }}</textarea>
    @error($colname)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
