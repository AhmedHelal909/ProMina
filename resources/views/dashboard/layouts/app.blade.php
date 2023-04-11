<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title', 'suhag')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    @include('dashboard.layouts.style')

    @stack('style')

</head>

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        @include('dashboard.layouts._aside')


        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                @include('dashboard.layouts._navbar')
                @yield('content')

            </div> <!-- content -->

            @include('dashboard.layouts._footer')

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

    @include('dashboard.layouts.script')

    @stack('script')

</body>

</html>
