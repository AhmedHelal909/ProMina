@extends('dashboard.layouts.app')
@section('title', __('site.Home'))
@section('content')

@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="page-title m-0">{{ __('site.dashboard') }}</h4>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title-box -->
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
           
            </div>
            <!-- end row -->

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->

@endsection

@push('script')
@endpush
