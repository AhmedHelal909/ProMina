<form style="display: inline-block" action="{{route('dashboard.'.$module_name_plural.'.destroy', $row->id)}}" method="POST">
    {{ method_field('Delete') }}
    @csrf
    <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $row->id }}">
 <!--
    <a href="{{route('dashboard.'.$module_name_plural.'.destroy', $row->id)}}" class="btn btn-danger" id="delete" title='Delete'><i class="fa fa-trash"></i></a>
 -->
    <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash" title="Delete"></i></button>
  </form>