<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta developer="Md. muttakin molla &amp; Asif imtiaz udoy" content="www.muttakin.d3itsolution.com">
    <meta designer="Asif imtiaz udoy &amp; Md. Muttakin molla" content="www.muttakin.d3itsolution.com">
    <meta name="title" content="Provati Khobor: Bangla news portal">
    <meta name="url" content="http://provatikhobor.com/">
    <meta name="keyword" content="alesha mart, all bangla newspaper, bangla newspaper, sumanbd, bangla web tools, dhaka post, jago news,ajker potrika,evaly,legue1, psg, newspaper,news paper,bd newspaper, bangla news, bangla newspaper, bengali newspaper,bangladesh newspaper,bangla news paper,bangladeshi newspaper,news paper bangladesh,daily news paper in bangladesh,daily newspapers of bangladesh,daily newspaper,Daily newspaper,Current News,current news,bengali daily newspaper,daily News,The Daily Prothom Alo, Prothom Alo, Prothom, provatikhobor, provati">
    @yield('meta')
    <title>Provati Khobor</title>
    <link rel="icon" href="{{ url('assets/frontend/images/logo/favicon.png') }}" type="image/x-icon"> <!-- Favicon-->

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    {{-- asset('assets/backend/vendor --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Swiper css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/swiper/swiper.min.css') }}">
    <!-- Slick css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/slick/slick.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.min.css') }}">
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
