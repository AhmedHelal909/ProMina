<div class="row justify-content-between">
    <div class="col-md-3">
        <h4 class="mt-0 header-title">{{ __('site.details') }} </h4>
    </div>
    <div class="col-md-2">

        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
            @lang('site.back')</a>

        <a href="{{ route('dashboard.' . $module_name_plural . '.edit', $row) }}" class="btn btn-info"><i
                class="fa fa-edit"></i>
            @lang('site.edit')</a>
    </div>
</div>
