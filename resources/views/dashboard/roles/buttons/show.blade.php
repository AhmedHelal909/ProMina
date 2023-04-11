@can('read-'.$module_name_plural)

<a href="{{route('dashboard.'.$module_name_plural.'.show', $row)}}" rel="tooltip" title="" class="btn btn-info px-2 radius-30 btn-sm"
    data-original-title="@lang('site.edit') @lang('site.'.$module_name_singular)">
    <div class="font-15 text-white">
        <i class="far fa-eye"></i>
    </div>
</a>

@endcan
