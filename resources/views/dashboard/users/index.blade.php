@extends('dashboard.layouts.app')

@section('title', __('site.' . $module_name_plural))



@section('content')
<h4 class="text-uppercase" style="text-align: start; padding:10px !important;">@lang('site.' . $module_name_plural)</h4>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection


@push('style')
    @include('dashboard.utilities._style_datatable')
@endpush

@push('script')
    @include('dashboard.utilities._script_datatable')
@endpush


