@if (app()->getLocale() == 'ar')
    <!-- jQuery  -->
    <script src="{{ asset('assets-ar/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-ar/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-ar/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets-ar/js/detect.js') }}"></script>
    <script src="{{ asset('assets-ar/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets-ar/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets-ar/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets-ar/js/waves.js') }}"></script>
    <script src="{{ asset('assets-ar/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets-ar/js/jquery.scrollTo.min.js') }}"></script>

    <!--Morris Chart-->
    {{-- <script src="{{ asset('assets-ar/plugins/morris/morris.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets-ar/plugins/raphael/raphael.min.js') }}"></script> --}}

    <!-- dashboard js -->
    {{-- <script src="{{ asset('assets-ar/pages/dashboard.int.js') }}"></script> --}}

    <!-- App js -->
    <script src="{{ asset('assets-ar/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/lobibox@1.2.7/dist/js/lobibox.min.js"></script>
@else
    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

    <!--Morris Chart-->
    {{-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script> --}}

    <!-- dashboard js -->
    {{-- <script src="{{ asset('assets/pages/dashboard.int.js') }}"></script> --}}

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/lobibox@1.2.7/dist/js/lobibox.min.js"></script>
@endif

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
    $('.js-example-basic-multiple').select2();
</script>
@include('dashboard.includes.alert.delete')
@include('dashboard.includes.alert.success')
@include('dashboard.includes.alert.error')
