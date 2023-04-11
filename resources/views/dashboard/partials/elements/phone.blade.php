<div class="form-group {{ $detail['cssClass'] }}">
    <label for="exampleInputEmail1">@lang('site.' . $colname)</label>
    <input type="tel" id="phone" name="{{ $colname }}" class="form-control w-100 @error($colname) parsley-error @enderror" id="exampleInputEmail1"
        placeholder="@lang('site.enter') @lang('site.'.$colname)"
        value="{{ isset($row) ?  $row->name : old($colname) }}">
        <span id="valid-msg" class="hide">✓ Valid</span>
        <span id="error-msg" class="hide"></span>
    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
</div>
