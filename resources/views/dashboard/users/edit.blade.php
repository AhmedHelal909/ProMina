
@extends('dashboard.layouts.app')
@section('title',__('site.'.$module_name_singular.'.edit')) 

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="text-align: start">@lang('site.' . $module_name_plural)</h1>
                    </div>
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
                        <!-- jquery validation -->
                        <div class="card ">
                            <div class="card-header">
                                @include('dashboard.partials.elements.errors')
                                <h3 class="card-title">
                                    @lang('site.update') <small>@lang('site.' . $module_name_singular)</small>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (Route::is('dashboard.users.editProfile'))
                                
                            <form id="quickForm" action="{{ route('dashboard.' . $module_name_plural . '.updateProfile', $row->id) }}" method="post" enctype="multipart/form-data">
                            @else
                            <form id="quickForm" action="{{ route('dashboard.' . $module_name_plural . '.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf
                                {{ method_field('put') }}

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
