@foreach (config('laravellocalization.supportedLocales') as $locale => $index)
    <div class="form-group {{ $detail['cssClass'] }}">
        <label for="Input{{ $colname }}">@lang('site.' . $colname) {{ $locale }}</label>
        <input type="text" name="{{ $colname }}[{{ $locale }}]"
            class="form-control  @error($locale . '.' . $colname) parsley-error @enderror" id="Input{{ $colname }}"
            placeholder="@lang('site.enter') @lang('site.' . $colname) @lang('site.' . $locale)"
            value="{{ isset($row)
                ? (isset($row->getTranslations($colname)[$locale])
                    ? $row->getTranslations($colname)[$locale]
                    : '')
                : old($locale . '.' . $colname) }}" />

        @error($locale . '.' . $colname)
            <ul class="parsley-errors-list filled" id="parsley-id-5">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror

    </div>
@endforeach
