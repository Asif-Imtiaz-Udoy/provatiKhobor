<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>প্রভাতী এডমিন</title>
    <link rel="icon" href="{{ url('assets/frontend/images/logo/favicon.png') }}" type="image/x-icon"> <!-- Favicon-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- Dropify Css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/dropify/css/dropify.min.css') }}" />
    <link href="{{ asset('assets/backend/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('partials.backend.leftsidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('partials.backend.topbar')
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        @yield('breadcrumbs')
                    </div>

                    @yield('contents')
                    <!--Row-->

                    {{-- sweet alert --}}
                    @include('sweetalert::alert')

                    @yield('modal')

                </div>
                <!---Container Fluid-->
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Scripts -->
    <script src="{{ asset('assets/backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/ruang-admin.min.js') }}"></script>
    <!-- Dropify Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/dropify/js/dropify.min.js') }}"></script>

    {{-- tinymce editor --}}
    <script src="https://cdn.tiny.cloud/1/01hpguney4y6p573i5gsdxxhmdxb8y1jfris4zaq5d2s3vm2/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    @if (Route::is('admin.home'))
        <script src="{{ asset('assets/backend/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/demo/chart-area-demo.js') }}"></script>
    @endif

    <!-- Datatable scripts -->
    <script src="{{ asset('assets/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        /*------------------ Ajax Setup -----------------*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#dataTableHover').DataTable();
    </script>
    @yield('scripts')
</body>

</html>
