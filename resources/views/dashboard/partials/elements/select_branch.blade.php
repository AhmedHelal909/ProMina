@if($defaultBranch ==0 )
<div class="form-group {{ $detail['cssClass'] }}">
  <label for="Input{{ $colname }}">@lang('site.' . $colname)</label>
  <select class="form-control form-select form-select-sm js-example-basic-multiple" {{ $detail['attr'] }}
      aria-label="form-select-sm example" style="padding: 0.3rem .75rem" name="{{ $colname }}" id="branch_id">
      {{-- <option value="">{{__('site.all')}}</option>    --}}
      @foreach ($detail['data'] as $id => $val)
      <option value="{{ $id }}"
              {{ (isset($row) && ($detail['is_array'] ?  in_array($id,$row->branch_id) : $id == $row->branch_id)) || old($colname) == $id ? 'selected' : '' }}>
              {{ $val }}
          </option>
      @endforeach
  </select>
  @error($colname)
      <ul class="parsley-errors-list filled" id="parsley-id-5">
          <li class="parsley-required">{{ $message }}</li>
      </ul>
  @enderror

</div>
@else
    <input type="hidden" value="{{ $defaultBranch[0] }}" name="{{ $colname }}" id="branch_id"/>
    <input type="hidden" name="vendor_id" value="{{ auth('vendor')->user() ? auth('vendor')->user()->id : null }}">
@endif