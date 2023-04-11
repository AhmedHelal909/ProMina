@extends('dashboard.layouts.app')

@section('title', __('site.' . $module_name_plural))



@section('content')


    <div class="page-content-wrapper ">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            @include('dashboard.partials.global.nav-btn-show-page')

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                @havePermission('read-roles', get_guard())
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                            <span class="d-none d-md-block">{{ __('site.details') }}</span><span
                                                class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                        </a>
                                    </li>
                                @endhavePermission
                            
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                @havePermission('read-' . $module_name_plural, get_guard())
                                    <div class="tab-pane active p-3" id="home" role="tabpanel">
                                        @include('dashboard.company.' . $module_name_plural . '.partials.home')
                                    </div>
                                @endhavePermission
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('script')
@endpush
