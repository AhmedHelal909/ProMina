@if (app()->getLocale() == 'ar')
    {{-- <link rel="stylesheet" href="{{ asset('assets-ar/plugins/morris/morris.css') }}"> --}}

    <link href="{{ asset('assets-ar/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets-ar/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets-ar/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/lobibox@1.2.7/dist/css/lobibox.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
@else
    <!-- morris css -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}"> --}}

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/lobibox@1.2.7/dist/css/lobibox.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endif


{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="https://code.jquery.com/jquery-1.10.2.min.js"> --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('assets/css/intlTelInput.css')}}" rel="stylesheet" />

