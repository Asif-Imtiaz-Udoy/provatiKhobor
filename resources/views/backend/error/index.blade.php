<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Error 404</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/assets/css/style.min.css') }}">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row pt-5">
                <div class="col-sm-12">
                    <div class="">
                        <img class=" w-50" src="{{ asset('assets/backend/404.png') }}" alt="404" />
                    </div>
                </div>
                <div class="col-12 w-50 d-flex justify-content-center text-center">
                    <div class="col-4">
                        <a href="{{ route('admin.home') }}"
                            class="btn btn-primary btn-block text-center waves-effect waves-light">GO TO HOMEPAGE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/backend/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>