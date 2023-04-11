<div class="form-group {{ $detail['cssClass'] }}">
    <label for="Input{{ $colname }}">@lang('site.' . $colname)</label>
    <select class="form-control form-select form-select-sm js-data-example-ajax " {{ $detail['attr'] }}
        aria-label=".form-select-sm example" style="padding: 0.3rem .75rem" name="{{ $colname }}"  id= "{{ $detail['id'] }}" >
        <option value="" selected="selected">{{__('site.search')}}</option>
    </select>
    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
  
  </div>
  