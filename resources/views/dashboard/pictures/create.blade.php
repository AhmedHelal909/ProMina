@extends('dashboard.layouts.app')
@section('title',__('site.'.$module_name_singular.'.add')) 

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="page-title m-0" style="padding: 10px; text-align:start">@lang('site.' . $module_name_plural)</h4>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@lang('site.home')</a></li>
                            <li class="breadcrumb-item active">@lang('site.' . $module_name_singular)</li>
                        </ol>
                    </div> --}}
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        @include('dashboard.partials.elements.errors')
                        <!-- jquery validation -->
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <small>@lang('site.'.$module_name_singular.'.add')</small>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('dashboard.' . $module_name_plural . '.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                @include('dashboard.'.$module_name_plural.'.form')

                              

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('site.submit')
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6"></div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
