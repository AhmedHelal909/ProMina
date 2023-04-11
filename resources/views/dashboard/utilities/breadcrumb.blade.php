<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">@lang('site.'.$module_name_plural)</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                @php
                    $baseUrl = request()->segment(1) ;
                @endphp
                <li class="breadcrumb-item">
                    <a href="{{ route($baseUrl.'.home') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                @if(request()->segment(2) <> 'home' )
                <li class="breadcrumb-item">
                    <a href="{{ route($baseUrl.'.'.$module_name_plural.'.index') }}">@lang('site.'.$module_name_plural)</a>
                </li>
                @endif


                @if(request()->segment(3) == 'create' )
                    <li class="breadcrumb-item active" aria-current="page">@lang('site.create') @lang('site.'.$module_name_plural)</li>
                @elseif( request()->segment(4) == 'edit' )
                    <li class="breadcrumb-item active" aria-current="page"> @lang('site.edit') @lang('site.'.$module_name_plural)</li>
                @endif

            </ol>
        </nav>
    </div>
    {{-- <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-light">Settings</button>
            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                    href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                    link</a>
            </div>

        </div>
    </div> --}}
</div>
