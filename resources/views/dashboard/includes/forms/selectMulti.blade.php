<div class="{{ $detail['cssClass'] }}">
    <label for="{{ $colname }}" class="form-label">@lang('site.' . $colname)</label>
    <select class="form-select @error($colname) is-invalid @enderror" id="{{ $colname }}" name="{{ $colname }}[]" aria-describedby="{{ $colname }}Feedback"
    {{ $detail['attr'] }}>
        <option value="">Choose...</option>
        @foreach ($detail['data'] as $dataId => $dataName)
            <option value="{{ $dataId }}"
            {{ ( ((isset($row) && $row->$colname == $dataId) || (isset($row) && $detail['val'] == $dataId)) || ( in_array( $dataId, old($colname) ? old($colname) : [] ) ) ) ? 'selected' : '' }}
             >{{ $dataName }}</option>
        @endforeach
    </select>
    @error($colname)
    <div id="{{ $colname }}Feedback" class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>
