<div class="form-group {{ $detail['cssClass'] }}">
    <label for="exampleInputEmail1">@lang('site.' . $colname)</label>
    <input type="number" name="{{ $colname }}" {{ $detail['attr'] }} class="form-control @error($colname) parsley-error @enderror"
        id="exampleInputEmail1" placeholder="@lang('site.enter') @lang('site.'.$colname )"
        value="{{ isset($row) ? (old($colname) ? old($colname) : $row->$colname) : old($colname) }}">

    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
</div>
