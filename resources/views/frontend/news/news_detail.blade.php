@extends('layouts.frontend')

@section('meta')
    <meta property="og:url" content="{{ URL::to('/') }}/news-detail/{{ $news->id }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $news->title }}" />
    <meta property="og:description" content="{!! strip_tags($news->news_body) !!}.." />
    <meta property="og:image" content="{{ url('images/news/og/', $news->news_image) }}" />
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="details">
                <div class="row">
                    <div class="details-header">
                        <div class="col-lg-8">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="{{ route('home') }}">প্রচ্ছদ</a>
                                </li>
                            </ul>
                            <div class="details-title">
                                <h1>{{ $news->title }}</h1>
                            </div>
                            <div class="news-info d-flex">
                                <div class="author-img">
                                    <img class="img-fluid" src="{{ asset('assets/frontend/images/logo/logo.png') }}"
                                        alt="#">
                                </div>
                                <div id="print">
                                    <div id="print-logo" class="d-flex justify-content-between mb-20 d-none">
                                        <img src="{{ url('assets/frontend/images/logo/logo.png') }}" alt="logo">
                                        <div class="news-info d-flex">
                                            <div class="reporter">
                                                <p class="mb-0">
                                                    {{ $news->reporter == null ? 'প্রভাতী খবর' : $news->reporter }}
                                                </p>
                                                <p>{{ bangla_date(strtotime($news->created_at), 'en') }},&nbsp;&nbsp;{{ $news->created_at->format('g:i A') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="news-body" class="d-none">
                                        <div class="news-img">
                                            <img class="img-fluid w-100"
                                                src="{{ url('/images/news', $news->news_image) }}" alt="news image">
                                        </div>
                                        <div id="print-title" class="details-title d-flex justify-content-center ptb-10">
                                            <h1>{{ $news->title }}</h1>
                                        </div>
                                        <div class="news-details p-20">
                                            <p>
                                                {!! $news->news_body !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="reporter">
                                    <p>{{ $news->reporter == null ? '' : $news->reporter }}</p>
                                    <p>{{ bangla_date(strtotime($news->created_at), 'en') }},&nbsp;&nbsp;{{ $news->created_at->format('g:i A') }}
                                    </p>
                                </div>
                            </div>
                            <ul class="share d-flex">
                                <li>
                                    <div id="facebook-share" class="fb-share-button"
                                        data-href="{{ URL::to('/') }}/news-detail/{{ $news->id }}"
                                        data-layout="button_count">
                                    </div>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text='{{ URL::to('/') }}/news/{{ $news->id }}'"
                                        target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://web.whatsapp.com/send?text='{{ URL::to('/') }}/news/{{ $news->id }}'"
                                        target="_blank"><i class="zmdi zmdi-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="printDiv('print')"><i
                                            class="zmdi zmdi-print"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- advertisement section -->
                        <div class="col-lg-4">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-10 m-auto">
                        <div class="news-img">
                            <img class="img-fluid w-100" src="{{ url('/images/news', $news->news_image) }}"
                                alt="news image">
                            <div class="caption">
                                <figcaption class="text-center text-muted">{{ $news->image_caption }}া</figcaption>
                            </div>
                        </div>
                        <div class="news-details p-20">
                            <p>
                                {!! $news->news_body !!}</p>
                        </div>
                        <!------ Related news start ------>
                        <div class="row mt-30">
                            <div class="col-12">
                                <div class="category-side-title mb-20">
                                    <span>সম্পর্কিত</span>
                                </div>
                            </div>
                            @if (!empty($relatedNewses))
                                @foreach ($relatedNewses as $key => $relatedNews)
                                    <div class="col-lg-4">
                                        <div class="single-news mb-10">
                                            <div class="thumbnail">
                                                <img class="img-fluid w-100"
                                                    src="{{ url('/images/news', $relatedNews->news_image) }}"
                                                    alt="news image">
                                            </div>
                                            <div class="single-news-title">
                                                <a href="{{ route('newsDetail', $relatedNews->id) }}"
                                                    class="mtb-10">{{ $relatedNews->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!------ Related news start ------>

                        <!------ More news start ------>
                        <div class="row mt-30">
                            <div class="col-12">
                                <div class="category-side-title mb-20">
                                    <span>আরও</span>
                                </div>
                            </div>
                            @if (!empty($latestNewses))
                                @foreach ($latestNewses as $key => $latestNews)
                                    <div class="col-lg-4">
                                        <div class="single-news mb-10">
                                            <div class="thumbnail">
                                                <img class="img-fluid w-100"
                                                    src="{{ url('/images/news', $latestNews->news_image) }}"
                                                    alt="news image">
                                            </div>
                                            <div class="single-news-title">
                                                <a href="{{ route('newsDetail', $latestNews->id) }}"
                                                    class="mtb-10">{{ $latestNews->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <!------ More news start ------>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function printDiv(print) {
            $('#print-logo').removeClass('d-none');
            $('#news-body').removeClass('d-none');
            var printContents = document.getElementById(print).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

            $('#print-logo').addClass('d-none');
            $('#news-body').addClass('d-none');
        }
    </script>
@endsection
