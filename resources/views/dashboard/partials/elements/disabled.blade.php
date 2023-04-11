<div class="form-group {{ $detail['cssClass'] }}">
    <label for="exampleInputEmail1" {{$detail['attr']}}>@lang('site.' . $colname)</label>
    <input type="text"   {{$detail['attr']}} class="form-control @error($colname) parsley-error @enderror" id="{{$detail['id']}}">

</div>