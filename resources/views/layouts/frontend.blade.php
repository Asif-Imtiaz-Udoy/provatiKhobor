<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="title" content="Ion_Tv">
    <meta name="url" content="https://iontv.co.uk//">
    <meta name="keyword"
        content="alesha mart, all bangla newspaper, bangla newspaper, sumanbd, bangla web tools, dhaka post, jago news,ajker potrika,evaly,legue1, psg, newspaper,news paper,bd newspaper, bangla news, bangla newspaper, bengali newspaper,bangladesh newspaper,bangla news paper,bangladeshi newspaper,news paper bangladesh,daily news paper in bangladesh,daily newspapers of bangladesh,daily newspaper,Daily newspaper,Current News,current news,bengali daily newspaper,daily News,The Daily Prothom Alo, Prothom Alo, Prothom, provatikhobor, provati">
    @yield('meta')
    <title>Ion News</title>
    <link rel="icon" href="{{ url('assets/frontend/images/logo/favicon.png') }}" type="image/x-icon">
    <!-- Favicon-->

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    {{-- asset('assets/backend/vendor --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <!-- Swiper css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/swiper/swiper.min.css') }}">
    <!-- Slick css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/slick/slick.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/app.min.css') }}">
</head>

<body>
    <!------ Header start ------>
    @include('partials.frontend.header')
    <!------ Header end ------>

    @yield('content')

    <!------ Footer start ------>
    @include('partials.frontend.footer')
    <!------ Footer end ------>



    <!-- All js files are included here. -->
    <!-- jquery -->
    <script src="{{ asset('assets/frontend/plugins/jquery/jquery-v3.3.1.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('assets/frontend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Swiper JS -->
    <script src="{{ asset('assets/frontend/plugins/swiper/swiper.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('assets/frontend/plugins/slick/slick.min.js') }}"></script>
    <!-- Main js file  -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>
