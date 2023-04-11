<div class="form-group">
    <label for="Input{{ $colname }}">@lang('site.' . $colname)</label>
    <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example"
        name="{{ $colname }}">
        <option value="">select @lang('site.'.$colname)</option>
        @foreach ($detail['data'] as $data)
            <option value="{{ $data->id }}"
                {{ (isset($row) && $row->id == $data->id) || old($colname) == $data->id ? 'selected' : '' }}>
                {{ $data->getTranslations($detail['colName'])[app()->getLocale()] }}
            </option>
        @endforeach
    </select>
</div>
