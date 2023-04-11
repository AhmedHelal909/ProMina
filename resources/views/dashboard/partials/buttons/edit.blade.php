<form style="display: inline-block" action="{{route('dashboard.'.$module_name_plural.'.edit', $row->id)}}" method="POST">
    {{ method_field('Get') }}
    @csrf
    <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $row->id }}">
    <button type="submit" class="btn btn-primary"><i class="fa fa-edit" title="Edit"></i></button>
  </form>

 
