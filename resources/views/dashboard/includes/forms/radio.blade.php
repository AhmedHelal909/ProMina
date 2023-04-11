<div class="{{ $detail['cssClass'] }}">
    <div class="form-check-inline">
        <h6 class="mb-0 text-uppercase">الموقف</h6>
        @forelse ($detail['data'] as $key => $val)
        <input class="form-check-input" type="{{ $detail['type'] }}" name="{{ $colname }}" id="invalidCheck{{ $val }}"
                {{ isset($row) && $row->$colname == $key ? 'checked' : '' }} value="{{ $key }}" {{ $detail['attr'] }}>
            <label class="form-label form-check-label" for="invalidCheck{{ $val }}">@lang('site.' .$val) </label>
            
        @empty
            
            <input class="form-check-input" type="{{ $detail['type'] }}" name="{{ $colname }}" id="invalidCheck"
                value="" {{ isset($row) && $row->$colname == 1 ? 'checked' : '' }}  {{ $detail['attr'] }}>
                <label class="form-check-label" for="invalidCheck">@lang('site.' . $colname)</label>
        @endforelse
    </div>
    <style>
        .form-check-input:checked[type=radio]
        {
            background-color:white;
            
        }
        .form-check-inline
            {
                top: 30%;
                position: relative;
            }
        @media(max-width:500px)
        {
            .form-check-inline
            {
                margin-left:0;
                top: 8px;
                position: relative;
            }
        }
    </style>
</div>
