{{-- @if (auth()->user()->isAbleTo('read-'.$module_name_plural)) --}}
@if (auth()->user()->hasPermissionTo('update-'.$module_name_plural))
<a href="{{route('dashboard.'.$module_name_plural.'.edit', $row)}}" rel="tooltip" title="" class="btn btn-success waves-effect waves-light btn-sm"
    data-original-title="@lang('site.edit') @lang('site.'.$module_name_singular)">
    <div class="font-15 text-white">
        <i class="fa fa-edit"></i>
    </div>
</a>

@else
<button rel="tooltip" title="" class="btn btn-success waves-effect waves-light btn-sm" disabled style="  cursor: not-allowed;
pointer-events: all !important;"
    data-original-title="@lang('site.edit') @lang('site.'.$module_name_singular)">
    <div class="font-15 text-white" >
        <i class="fa fa-edit"></i>
    </div>
</button>


@endif 
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
@if (auth()->user()->hasPermissionTo('read-'.$module_name_plural))

<a href="{{route('dashboard.'.$module_name_plural.'.show', $row)}}" rel="tooltip" title="" class="btn btn-info px-2 radius-30 btn-sm"
    data-original-title="@lang('site.edit') @lang('site.'.$module_name_singular)">
    <div class="font-15 text-white">
        <i class="far fa-eye"></i>
    </div>
</a>

@endif
