<header>
    <!-- Logo Section -->
    <div class="container">
        <div class="logo d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}">
                <img src="{{ url('assets/frontend/images/logo/logo.png') }}" alt="logo">
            </a>
            <a href="#">ই-পেপার</a>
        </div>
    </div>

    <!------ Navbar start ------>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i
                                class="zmdi zmdi-home"></i></a>
                    </li>
                    @if (!empty($categories))
                        @foreach ($categories as $key => $category)
                            @if ($key < 8)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('categoryDetails', $category->slug) }}">{{ $category->name }}</a>
                                </li>
                            @endif
                        @endforeach
                        <li class="nav-item dropdown has-megamenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                অন্যান্য
                            </a>
                            <div class="dropdown-menu megamenu" role="menu">
                                <div class="container d-flex justify-content-between flex-wrap">
                                    @foreach ($categories as $key => $category)
                                        @if ($key >= 7)
                                            <a class="dropdown-item w-25 text-center"
                                                href="{{ route('categoryDetails', $category->slug) }}">{{ $category->name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
                <ul class="social-links mb-0">
                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                    <li><a href="#"><i class="zmdi zmdi-youtube"></i></a></li>
                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!------ Navbar end ------>

    <!------ Top news start ------>
    <section class="top-news-bg">
        <div class="container">
            <div class="top-news d-flex">
                <div class="top-news-left">
                    <span>শিরোনামঃ</span>
                </div>
                <marquee direction="left">
                    @if (!empty($categories))
                        @foreach ($newses as $news)
                            <span><i class="zmdi zmdi-dot-circle"></i>{{ $news }}</span>
                        @endforeach
                    @endif
                </marquee>
            </div>
        </div>
    </section>
    <!------ Top news end ------>
</header>
