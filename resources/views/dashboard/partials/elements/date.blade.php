<div class="form-group {{ $detail['cssClass'] }}">
    <label for="exampleInputEmail1">@lang('site.' . $colname)</label>
    <input type="date" name="{{ $colname }}" class="form-control @error($colname) parsley-error @enderror"
        id="exampleInputEmail1" placeholder="@lang('site.enter') {{ $colname }}"
        value="{{ isset($row->$colname) ? $row->$colname : (old($colname) ? old($colname) : date('Y-m-t')) }}">

    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
</div>
