@extends('layouts.frontend')

@section('content')
    @php
    use App\Models\News;
    @endphp
    <!------ Lead news start ------>
    <section class="lead">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <a href="#">
                        <img class="w-100 mb-20 img-fluid" src="{{ asset('assets/frontend/images/test/advertise-1.png') }}"
                            alt="Advertisement">
                    </a>
                    <a href="#">
                        <img class="w-100 img-fluid" src="{{ asset('assets/frontend/images/test/advertise-3.png') }}"
                            alt="Advertisement">
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 d-flex flex-column justify-content-center">
                            @if (!empty($lead_newses))
                                @foreach ($lead_newses as $lead_news)
                                    <div class="news-heading">
                                        <p class="text-center border-bottom"><a href="news-details.html">
                                                {!! mb_substr($lead_news->title, 0, 50) !!}</a>
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="lead-news h-75">
                                @if (!empty($lead_newses))
                                    @foreach ($lead_newses as $key => $lead_news)
                                        @if ($key == 0)
                                            <a href="{{ route('newsDetail', $lead_news->id) }}">
                                                <img class="img-fluid" style="width: 394px; height: 595px;"
                                                    src="{{ url('/images/news', $lead_news->news_image) }}"
                                                    alt="lead news">
                                                <p class="lh-1 py-2">{!! mb_substr($lead_news->title, 0, 50) !!}</p>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            @if (!empty($news_boxes))
                                @foreach ($news_boxes as $key => $news_box)
                                    <div class="news-box bg-white pb-1 mb-2">
                                        <a href="#">
                                            <img class="img-fluid p-1" style="width:337px; height: 185px;"
                                                src="{{ url('/images/news', $news_box->news_image) }}" alt="News Box">
                                            <h6 class="mb-1 pl-1 text-dark">{!! mb_substr($news_box->sub_title, 0, 50) !!}</h6>
                                        </a>
                                        <p class="fs-6 lh-1 px-2 mb-0">{!! mb_substr($news_box->title, 0, 50) !!}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="latest border h-100">
                        <div class="latest-heading">
                            <h5 class="text-center py-2 bg-main text-white">সর্বশেষ/সর্বাধিক পঠিত</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------ Lead news end ------>

    <!------ Advertisement start ------>
    <section class="advertisement mt-30">
        <div class="container">
            <a href="#">
                <img class="w-100 img-fluid" src="{{ asset('assets/frontend/images/test/advertise.png') }}"
                    alt="Advertisement">
            </a>
        </div>
    </section>
    <!------ Advertisement end ------>

    <!------ Successful start ------>
    <section class="successful mt-30">
        <div class="container">
            <div class="bg-white">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <h1>সফল যারা</h1>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row py-3">
                            <div class="col-lg-3">
                                <div class="successful-item d-flex align-items-center justify-content-around py-2">
                                    <a href="#">
                                        <div class="thumbnail rounded-circle overflow-hidden">
                                            <img class="h-100 img-fluid"
                                                src="{{ asset('assets/frontend/images/test/news-1.jpg') }}"
                                                alt="thumbnail">
                                        </div>
                                    </a>
                                    <div class="details">
                                        <p class="lh-1 mb-0">বিনম্র শ্রদ্ধা ও ভালোবাসা</p>
                                        <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="successful-item d-flex align-items-center justify-content-around py-2">
                                    <a href="#">
                                        <div class="thumbnail rounded-circle overflow-hidden">
                                            <img class="h-100 img-fluid"
                                                src="{{ asset('assets/frontend/images/test/news-1.jpg') }}"
                                                alt="thumbnail">
                                        </div>
                                    </a>
                                    <div class="details">
                                        <p class="lh-1 mb-0 ms-1">১৭ই মার্চ বাঙালির অপার আনন্দের দিন</p>
                                        <a class="text-info ms-1" href="#">মাহমুদ আহমেদ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="successful-item d-flex align-items-center justify-content-around py-2">
                                    <a href="#">
                                        <div class="thumbnail rounded-circle overflow-hidden">
                                            <img class="h-100 img-fluid"
                                                src="{{ asset('assets/frontend/images/test/news-1.jpg') }}"
                                                alt="thumbnail">
                                        </div>
                                    </a>
                                    <div class="details">
                                        <p class="lh-1 mb-0 ms-1">১৭ই মার্চ বাঙালির অপার আনন্দের দিন</p>
                                        <a class="text-info ms-1" href="#">মাহমুদ আহমেদ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="successful-item d-flex align-items-center justify-content-around py-2">
                                    <a href="#">
                                        <div class="thumbnail rounded-circle overflow-hidden">
                                            <img class="h-100 img-fluid"
                                                src="{{ asset('assets/frontend/images/test/news-1.jpg') }}"
                                                alt="thumbnail">
                                        </div>
                                    </a>
                                    <div class="details">
                                        <p class="lh-1 mb-0 ms-1">১৭ই মার্চ বাঙালির অপার আনন্দের দিন</p>
                                        <a class="text-info ms-1" href="#">মাহমুদ আহমেদ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------ Successful end ------>

    <!------ Advertisement start ------>
    <section class="advertisement mt-30">
        <div class="container">
            <a href="#">
                <img class="w-100 img-fluid" src="{{ asset('assets/frontend/images/test/advertise.png') }}"
                    alt="Advertisement">
            </a>
        </div>
    </section>
    <!------ Advertisement end ------>


    <!------ Feature Category start ------>
    @if (!empty($features))
        @foreach ($features as $key => $feature)
            @if ($key > 1)
                @if ($loop->iteration % 2 == 0)
                    @php
                        $featuresNewses = News::where('category_id', $feature->id)
                            ->latest()
                            ->limit(7)
                            ->get();
                    @endphp
                    <section class="mt-30">
                        <div class="container">
                            <div class="row">
                                @foreach ($features as $key => $feature)
                                    <div class="col-lg-3 position-relative">

                                        <div class="feature-slider">
                                            @foreach ($featuresNewses as $key => $feature)
                                                <div class="p-3 pb-1 mb-2 text-center">
                                                    <a href="#">
                                                        <img class="img-fluid"
                                                            src="{{ url('/images/news', $feature->news_image) }}"
                                                            alt="News Box">
                                                        <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়
                                                        </h5>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center">
                                            <a class="bg-main px-3 py-1 text-white" href="#">
                                                {{ $feature->category->name }}
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endif
            @endif
        @endforeach
    @endif
    <!------ Feature Category end ------>

    <!------ Advertisement start ------>
    <section class="advertisement mt-30">
        <div class="container">
            <a href="#">
                <img class="w-100 img-fluid" src="{{ asset('assets/frontend/images/test/advertise.png') }}"
                    alt="Advertisement">
            </a>
        </div>
    </section>
    <!------ Advertisement end ------>

    <!------ Photo gallery start ------>
    @if (!empty($photos))
        <section class="photo-gallery mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="title d-flex justify-content-between align-items-center">
                            <div class="swiper-prev"><i class="zmdi zmdi-caret-left"></i></div>
                            <h2 class="mb-0">ফটো গ্যালারি</h2>
                            <div class="swiper-next"><i class="zmdi zmdi-caret-right"></i></div>
                        </div>
                        <div class="swiper mySwiper ptb-30">
                            <div class="swiper-wrapper">
                                @foreach ($photos as $key => $photo)
                                    <div class="swiper-slide">
                                        <img class="img-fluid"
                                            src="{{ url('/images/multimedia', $photo->photo) }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!------ Photo gallery end ------>


    <!------ Opinion start ------>
    @if (!empty($opinions))
        <section class="mt-30">
            <div class="container">
                <div class="bg-section">
                    <h5 class="p-2">মতামত</h5>
                    <div class="row">
                        @foreach ($opinions as $key => $opinion)
                            <div class="col-lg-3">
                                <div class="p-3 pb-1 mb-2">
                                    <a href="#">
                                        <img class="img-fluid" style="width:355px; height: 200px;"
                                            src="{{ url('/images/news', $opinion->news_image) }}" alt="News Box">
                                    </a>
                                    <br>
                                    <a href="#" class="p-2">{!! mb_substr($opinion->title, 0, 30) !!}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!------ Opinion end ------>


    <!------ Advertisement start ------>
    <section class="advertisement mt-30">
        <div class="container">
            <a href="#">
                <img class="w-100 img-fluid" src="{{ asset('assets/frontend/images/test/advertise.png') }}"
                    alt="Advertisement">
            </a>
        </div>
    </section>
    <!------ Advertisement end ------>
@endsection
