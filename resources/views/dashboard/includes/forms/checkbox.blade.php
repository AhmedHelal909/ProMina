<div class="{{ $detail['cssClass'] }}">
    <div class="form-check">
        
        <input type="{{ $detail['type'] }}" name="{{ $colname }}" id="invalidCheck" value="1"
            {{ isset($row) && $row->$colname == 1 ? 'checked' : '' }} {{ $detail['attr'] }}>
            <label class="form-label" for="invalidCheck">@lang('site.' . $colname)</label>
        @error($colname)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <style>
        .form-check
        {
            position:relative;
            top:50%;
        }
        @media(max-width:500px)
        {
            .form-check
        {
            top:35%;
            padding-right:0;
        }
        }
    </style>
</div>
