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
                                @havePermission('read-users', get_guard())
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                                            onclick="getUsers()">
                                            <span class="d-none d-md-block">{{ __('site.details') }}</span><span
                                                class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                        </a>
                                    </li>
                                @endhavePermission
                                @havePermission('read-offers', get_guard())
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#offers" role="tab"
                                            onclick="getOffers()">
                                            <span class="d-none d-md-block">{{ __('site.offers') }}</span><span
                                                class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                        </a>
                                    </li>
                                @endhavePermission
                                @havePermission('read-coupons', get_guard())
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#coupons" role="tab"
                                            onclick="getCoupons()">
                                            <span class="d-none d-md-block">{{ __('site.coupons') }}</span><span
                                                class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                        </a>
                                    </li>
                                @endhavePermission
                                @havePermission('read-orders', get_guard())
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#orders" role="tab"
                                            onclick="getOrders()">
                                            <span class="d-none d-md-block">{{ __('site.orders') }}</span><span
                                                class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
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
                                @havePermission('read-offers', get_guard())
                                    <div class="tab-pane p-3" id="offers" role="tabpanel">
                                        @include('dashboard.partials.global.offers')
                                    </div>
                                @endhavePermission
                                @havePermission('read-coupons', get_guard())
                                    <div class="tab-pane p-3" id="coupons" role="tabpanel">
                                        @include('dashboard.partials.global.coupons')
                                    </div>
                                @endhavePermission
                                @havePermission('read-orders', get_guard())
                                    <div class="tab-pane p-3" id="orders" role="tabpanel">
                                        @include('dashboard.partials.global.orders')
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
