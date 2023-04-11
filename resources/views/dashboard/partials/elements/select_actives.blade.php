<div class="form-group">
    <label for="Input{{ $colname }}">@lang('site.' . $colname)</label>

    <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example"
        name="{{ $colname }}">
        <option selected disabled>@lang('site.acctives')</option>
        @foreach ($actives as $active)
            <option value="{{ $active->id }}" 
                @if(isset($row))
                {{ $active->id == $row->active->id ? 'selected' : '' }} 
                @endif >
                {{ $active->name }}</option>
        @endforeach
    </select>
</div>
