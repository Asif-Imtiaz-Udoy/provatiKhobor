@extends('layouts.frontend')

@section('content')

    <!------ Category Lead news start ------>
    <section>
        <div class="mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="category-title">
                            <h2>{{ $category->name }}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                @foreach ($latestNewses as $key => $latestNews)
                                    @if ($key == 0)
                                        <div class="feature-news">
                                            <a href="{{ route('newsDetail', $latestNews->slug) }}">
                                                <img class="img-fluid w-100"
                                                    src="{{ url('/images/news', $latestNews->news_image) }}"
                                                    alt="feature-news">
                                            </a>
                                            <a href="{{ route('newsDetail', $latestNews->slug) }}">
                                                <h2 class="mtb-10">{{ $latestNews->title }}</h2>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="row">
                                    @foreach ($latestNewses as $key => $latestNews)
                                        @if (0 < $key && $key <= 2)
                                            <div class="col-lg-12 col-md-6">
                                                <div class="single-news mb-10">
                                                    <div class="thumbnail">
                                                        <a href="{{ route('newsDetail', $latestNews->slug) }}">
                                                            <img class="img-fluid w-100"
                                                                src="{{ url('/images/news', $latestNews->news_image) }}"
                                                                alt="news image">
                                                        </a>
                                                    </div>
                                                    <div class="single-news-title">
                                                        <a class="mtb-10"
                                                            href="{{ route('newsDetail', $latestNews->slug) }}">{{ $latestNews->title }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @foreach ($latestNewses as $key => $latestNews)
                                @if ($key > 2)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-news mb-10">
                                            <div class="thumbnail">
                                                <a href="{{ route('newsDetail', $latestNews->slug) }}">
                                                    <img class="img-fluid w-100"
                                                        src="{{ url('/images/news', $latestNews->news_image) }}"
                                                        alt="news image">
                                                </a>
                                            </div>
                                            <div class="single-news-title">
                                                <a class="mtb-10"
                                                    href="{{ route('newsDetail', $latestNews->slug) }}">{{ $latestNews->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <aside>
                            <div class="category-side-title ml-15 mr-15">
                                <span>এই সপ্তাহে পাঠকপ্রিয়</span>
                            </div>
                            <div class="latest-news">
                                @if (!empty($popularNewses))
                                    @foreach ($popularNewses as $popularNews)
                                        <div class="list-news-item ptb-10">
                                            <div class="thumbnail">
                                                <a href="{{ route('newsDetail', $popularNews->slug) }}">
                                                    <img class="img-fluid w-100"
                                                        src="{{ url('/images/news', $popularNews->news_image) }}"
                                                        alt="news image">
                                                </a>
                                            </div>
                                            <a
                                                href="{{ route('newsDetail', $popularNews->slug) }}">{{ $popularNews->title }}</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </aside>
                    </div>
                </div>
                {{ $latestNewses->links() }}
            </div>
        </div>
    </section>
    <!------ Category Lead news end ------>

@endsection
