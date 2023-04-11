{{-- @if (auth()->user()->isAbleTo('read-'.$module_name_plural)) --}}
@if (auth()->user()->hasPermissionTo('update-'.$module_name_plural))
<form action="{{route('dashboard.'.$module_name_plural.'.destroy', $row)}}" class="delete" method="POST" style="display: inline-block">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" rel="tooltip" title="" class="btn btn-danger waves-effect waves-light btn-sm" data-original-title="@lang('site.delete')">
        <div class="font-15 text-white">
            <i class="fa fa-trash"></i>
        </div>
    </button>
    
</form>
@else
<button type="button" rel="tooltip" title="" disabled class="btn btn-danger waves-effect waves-light btn-sm" style="  cursor: not-allowed;
pointer-events: all !important;" data-original-title="@lang('site.delete')">
    <div class="font-15 text-white">
        <i class="fa fa-trash"></i>
    </div>
</button>
@endif
