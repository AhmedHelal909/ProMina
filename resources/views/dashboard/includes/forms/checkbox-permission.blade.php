<div class="col-12">
    <div class="form-check">
        <input name="permissions[]" class="form-check-input" type="checkbox" id="{{ $map . '-' . $model }}"
            {{ isset($row) && $row->hasPermission($map . '-' . $model) ? 'checked' : '' }}
            value="{{ $map . '-' . $model }}">
        <label class="form-check-label" for="{{ $map . '-' . $model }}"> @lang('site.' . $map)</label>
    </div>
    <style>
        .form-check-input:checked[type=checkbox]
        {
            background-color:white;
            
        }
    </style>
</div>
