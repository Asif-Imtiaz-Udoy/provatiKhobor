@extends('layouts.frontend')

@section('content')
    @php
    use App\Models\Category;
    @endphp

    <!--  banner start -->
    <section>
        <div class="banner-sec mt-3">
            <div class="container">
                <div class="row">
                    @if (!empty($main_lead_newses))
                        @foreach ($main_lead_newses as $lead)
                            <div class="col-lg-6 col-sm-12 col-md-6 banner-img">
                                <div class="cometion-img text-center pb-3 pt-3">
                                    <img class="img-fluid" src="{{ url('images/news/' . $lead->news_image) }}" alt="img.png">

                                    <p class="text-center text-danger"> <a href="{{ route('newsDetail', $lead->id) }}">
                                            {{ $lead->title }}</a></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="banner-vedio">
                            <iframe scrolling="no" src="https://iqsat.net/ion.html#player1" width="640" height="360"
                                frameBorder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--  banner end -->


    <!--  top news start -->
    <section>
        <div class="top-news-sec">
            <div class="container">
                <div class="row">
                    @if (!empty($lead_newses))
                        @foreach ($lead_newses as $lead)
                            <div class="col-md-3 pt-4">
                                <div class="bgcolor p-2">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="news-text ">
                                                <p class="text-center"><a href="{{ route('newsDetail', $lead->id) }}">
                                                        {{ $lead->title }}</a> </p>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-img text-center">
                                                <img class="img-fluid w-75 h-75 pt-3"
                                                    src="{{ url('images/news/' . $lead->news_image) }}">
                                                <p class="text-danger mb-0"><i style="font-size: 10px;"
                                                        class="fa-solid fa-clock"></i><span style="font-size: 10px;"
                                                        class="text-danger"> 6 hour ago</span></p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
    </section>
    <!--  top news end -->


    <!-- you tube start -->
    <section>
        <div class="youtube-sec">
            <div class="youtube-head ">

                <div class="youtube-img d-flex justify-content-center">
                    <div class="boder mb-5">

                    </div>
                    <img class="img-fluid w-25 mt-5" src="{{ url('assets/frontend/images/test/youtube.png') }}">
                    <div class="boder mb-5">

                    </div>
                </div>

            </div>
            <div class="container">
                <div class="row pt-4">
                    @if (!empty($videos))
                        <div class="col-md-4">
                            @foreach ($videos as $key => $video)
                                @if ($key > 0 && $key <= 2)
                                    <div class="row bg-you mb-3">
                                        <div class="col-md-6 ps-0 ">

                                            <div class="youtube-news-img">
                                                <iframe src="{{ $video->video_link }}" class="w-100" name="myframe"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-0 ">
                                            <div class="ps-0">
                                                <p class="text-white pt-2 text-center">{{ $video->caption }} </p>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4 mt-3">
                            @foreach ($videos as $key => $video)
                                @if ($key == 0)
                                    <div class="you-news">
                                        <iframe src="{{ $video->video_link }}" class="w-100" style="height: 300px;"
                                            name="myframe"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            @foreach ($videos as $key => $video)
                                @if ($key >= 3 && $key <= 5)
                                    <div class="row bg-you mb-3">
                                        <div class="col-md-6 ps-0 ">

                                            <div class="youtube-news-img">
                                                <iframe src="{{ $video->video_link }}" class="w-100" name="myframe"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-0 ">
                                            <div class="ps-0">
                                                <p class="text-white pt-2 text-center">{{ $video->caption }} </p>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </section>
    <!-- you tube end--->



    <!-- national start & international news -->
    <section>
        <div class="national-sec">

            <div class="container">
                <div class="row">
                    @if (!empty($nationals))
                        <div class="col-md-6 boder-national">
                            <div class="youtube-head ">

                                <div class="youtube-img d-flex justify-content-center pt-3">
                                    <div class="boder4 mb-5">

                                    </div>
                                    <h2 class="text-info pb-4 ps-1 pe-1">জাতীয়</h2>
                                    <div class="boder5 mb-5">

                                    </div>
                                </div>

                            </div>
                            <div class="pe-1">
                                <div class="row">
                                    <div class="col-md-12 national-bg-mini">
                                    </div>
                                    @foreach ($nationals as $key => $news)
                                        @if ($loop->first)
                                            <div class="col-md-6 minus-margin">
                                                <div class="nation-img">
                                                    <img class="img-fluid ps-3 h-100 "
                                                        src="{{ url('images/news/' . $news->news_image) }}">

                                                </div>
                                                <h4 class="text-danger ps-3 pt-1"><a
                                                        href="{{ route('newsDetail', $news->id) }}">
                                                        {{ $news->title }}</a></h4>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="col-md-6 minus-margin">
                                        <div class="national-news">
                                            <div class="row">
                                                <div class="col-md-12 read-more">
                                                    <a href="#" class="d-flex justify-content-end align-items-center">
                                                        <span class="text-md-white text-dark">aro prun</span>
                                                        <i
                                                            class="fa-solid fa-caret-right text-md-white text-dark mt-1 ps-2"></i>
                                                    </a>

                                                </div>
                                                @foreach ($nationals as $news)
                                                    <div class="col-md-8 mt-2 text-lg-start text-center">
                                                        <div class="nation-text">
                                                            <p class="mb-0"><a
                                                                    href="{{ route('newsDetail', $news->id) }}">
                                                                    {{ $news->title }}</a></p>
                                                            <p style="line-height: 2px;" class="text-danger mb-0"><i
                                                                    style="font-size: 10px;"
                                                                    class="fa-solid fa-clock"></i><span
                                                                    style="font-size: 10px;" class="text-danger"> 6 hour
                                                                    ago</span></p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{ route('newsDetail', $news->id) }}">
                                                            <img class="img-fluid pt-3 w-100"
                                                                src="{{ url('images/news/' . $news->news_image) }}">
                                                        </a>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    {{-- internationa news start --}}
                    <div class="col-md-6 ">
                        <div class="youtube-head ">

                            <div class="youtube-img d-flex justify-content-center pt-3">
                                <div class="boder4 mb-5">

                                </div>
                                <h2 class="text-info pb-4 ps-1 pe-1">আন্তর্জাতিক</h2>
                                <div class="boder5 mb-5">

                                </div>
                            </div>

                        </div>
                        @if (!empty($internationals))
                            <div class="ps-1">
                                <div class="row">
                                    <div class="col-md-12 national-bg-mini">
                                    </div>
                                    @foreach ($internationals as $key => $news)
                                        @if ($loop->first)
                                            <div class="col-md-6 minus-margin">
                                                <div class="nation-img">
                                                    <img class="img-fluid ps-3 h-100 "
                                                        src="{{ url('images/news/' . $news->news_image) }}">

                                                </div>
                                                <h4 class="text-danger ps-3 pt-1"><a
                                                        href="{{ route('newsDetail', $news->id) }}">
                                                        {{ $news->title }}</a></h4>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="col-md-6 minus-margin">
                                        <div class="national-news">
                                            <div class="row">
                                                <div class="col-md-12 read-more">
                                                    <a href="#"
                                                        class="d-flex justify-content-end align-items-center">
                                                        <span class="text-md-white text-dark">aro prun</span>
                                                        <i
                                                            class="fa-solid fa-caret-right text-md-white text-dark mt-1 ps-2"></i>
                                                    </a>

                                                </div>
                                                @foreach ($internationals as $news)
                                                    <div class="col-md-8 mt-2 text-lg-start text-center">
                                                        <div class="nation-text">
                                                            <p class="mb-0"><a
                                                                    href="{{ route('newsDetail', $news->id) }}">
                                                                    {{ $news->title }}</a></p>
                                                            <p style="line-height: 2px;" class="text-danger mb-0"><i
                                                                    style="font-size: 10px;"
                                                                    class="fa-solid fa-clock"></i><span
                                                                    style="font-size: 10px;" class="text-danger"> 6 hour
                                                                    ago</span></p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{ route('newsDetail', $news->id) }}">
                                                            <img class="img-fluid pt-3 w-100"
                                                                src="{{ url('images/news/' . $news->news_image) }}">
                                                        </a>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- national end -->


    <!-- paly and entertainment start -->
    <section>
        <div class="national-sec">

            <div class="container">
                <div class="row">
                    {{-- play start --}}
                    <div class="col-md-6 boder-national">
                        <div class="youtube-head ">

                            <div class="youtube-img d-flex justify-content-center pt-3">
                                <div class="boder4 mb-5">

                                </div>
                                <h2 class="text-info pb-4 ps-1 pe-1">খেলাধুলা</h2>
                                <div class="boder5 mb-5">

                                </div>
                            </div>

                        </div>
                        @if (!empty($plays))
                            <div class="pe-1">
                                <div class="row">
                                    <div class="col-md-12 national-bg-mini">
                                    </div>
                                    @foreach ($plays as $key => $news)
                                        @if ($loop->first)
                                            <div class="col-md-6 minus-margin">
                                                <div class="nation-img">
                                                    <img class="img-fluid ps-3 h-100 "
                                                        src="{{ url('images/news/' . $news->news_image) }}">

                                                </div>
                                                <h4 class="text-danger ps-3 pt-1"><a
                                                        href="{{ route('newsDetail', $news->id) }}">
                                                        {{ $news->title }}</a></h4>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="col-md-6 minus-margin">
                                        <div class="national-news">
                                            <div class="row">
                                                <div class="col-md-12 read-more">
                                                    <a href="#"
                                                        class="d-flex justify-content-end align-items-center">
                                                        <span class="text-md-white text-dark">aro prun</span>
                                                        <i
                                                            class="fa-solid fa-caret-right text-md-white text-dark mt-1 ps-2"></i>
                                                    </a>

                                                </div>
                                                @foreach ($plays as $news)
                                                    <div class="col-md-8 mt-2 text-lg-start text-center">
                                                        <div class="nation-text">
                                                            <p class="mb-0"><a
                                                                    href="{{ route('newsDetail', $news->id) }}">
                                                                    {{ $news->title }}</a></p>
                                                            <p style="line-height: 2px;" class="text-danger mb-0"><i
                                                                    style="font-size: 10px;"
                                                                    class="fa-solid fa-clock"></i><span
                                                                    style="font-size: 10px;" class="text-danger"> 6 hour
                                                                    ago</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{ route('newsDetail', $news->id) }}">
                                                            <img class="img-fluid pt-3 w-100"
                                                                src="{{ url('images/news/' . $news->news_image) }}">
                                                        </a>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- play end --}}


                    {{-- entertainment news start --}}

                    <div class="col-md-6 ">
                        <div class="youtube-head ">

                            <div class="youtube-img d-flex justify-content-center pt-3">
                                <div class="boder4 mb-5">

                                </div>
                                <h2 class="text-info pb-4 ps-1 pe-1">বিনোদন</h2>
                                <div class="boder5 mb-5">

                                </div>
                            </div>

                        </div>
                        @if (!empty($entertainments))
                            <div class="ps-1">
                                <div class="row">
                                    <div class="col-md-12 national-bg-mini">
                                    </div>
                                    @foreach ($entertainments as $key => $news)
                                        @if ($loop->first)
                                            <div class="col-md-6 minus-margin">
                                                <div class="nation-img">
                                                    <img class="img-fluid ps-3 h-100 "
                                                        src="{{ url('images/news/' . $news->news_image) }}">

                                                </div>
                                                <h4 class="text-danger ps-3 pt-1"><a
                                                        href="{{ route('newsDetail', $news->id) }}">
                                                        {{ $news->title }}</a></h4>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="col-md-6 minus-margin">
                                        <div class="national-news">
                                            <div class="row">
                                                <div class="col-md-12 read-more">
                                                    <a href="#"
                                                        class="d-flex justify-content-end align-items-center">
                                                        <span class="text-md-white text-dark">aro prun</span>
                                                        <i
                                                            class="fa-solid fa-caret-right text-md-white text-dark mt-1 ps-2"></i>
                                                    </a>

                                                </div>
                                                @foreach ($entertainments as $news)
                                                    <div class="col-md-8 mt-2 text-lg-start text-center">
                                                        <div class="nation-text">
                                                            <p class="mb-0"><a
                                                                    href="{{ route('newsDetail', $news->id) }}">
                                                                    {{ $news->title }}</a></p>
                                                            <p style="line-height: 2px;" class="text-danger mb-0"><i
                                                                    style="font-size: 10px;"
                                                                    class="fa-solid fa-clock"></i><span
                                                                    style="font-size: 10px;" class="text-danger"> 6 hour
                                                                    ago</span></p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{ route('newsDetail', $news->id) }}">
                                                            <img class="img-fluid pt-3 w-100"
                                                                src="{{ url('images/news/' . $news->news_image) }}">
                                                        </a>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{-- entertaniment end --}}
                </div>
            </div>
        </div>
    </section>
    <!-- play and entertainment end -->



    <!-- feature-news start -->
    <section>
        <div class="boder-news mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        @php
                            $life_id = Category::where('slug', 'লাইফস্টাইল')->first();
                        @endphp
                        <div class=" d-flex justify-content-between border-toop">
                            <div class="boder-text1">
                                <span class="fw-bold">লাইফস্টাইল</span>
                            </div>
                            <a href="{{ route('categoryDetails', $life_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>

                        </div>
                        @if (!empty($lifestyles))
                            @foreach ($lifestyles as $key => $news)
                                @if ($loop->first)
                                    <img src="{{ url('images/news/' . $news->news_image) }}"
                                        class="img-fluid border-top">
                                    <p><a href="{{ route('newsDetail', $news->id) }}">
                                            {{ $news->title }}</a></p>
                                @endif
                            @endforeach
                            <div class="row  mb-3">
                                @foreach ($lifestyles as $news)
                                    <div class="col-md-6 ps-0 ">

                                        <div class="youtube-new-img">
                                            <a href="{{ route('newsDetail', $news->id) }}">
                                                <img class="img-fluid w-100 h-50  mb-2"
                                                    src="{{ url('images/news/' . $news->news_image) }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-0 ">
                                        <div class="ps-0">
                                            <p class=""><a href="{{ route('newsDetail', $news->id) }}">
                                                    {{ $news->title }}</a> </p>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>

                    {{-- it news start --}}
                    <div class="col-md-3">
                        @php
                            $it_id = Category::where('slug', 'তথ্যপ্রযুক্তি')->first();
                        @endphp
                        <div class=" d-flex justify-content-between border-toop">
                            <div class="boder-text1">
                                <span class="fw-bold">তথ্যপ্রযুক্তি</span>
                            </div>
                            <a href="{{ route('categoryDetails', $it_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        </div>
                        @if (!empty($itnews))
                            @foreach ($itnews as $key => $news)
                                @if ($loop->first)
                                    <img src="{{ url('images/news/' . $news->news_image) }}"
                                        class="img-fluid border-top">
                                    <p><a href="{{ route('newsDetail', $news->id) }}">
                                            {{ $news->title }}</a></p>
                                @endif
                            @endforeach
                            <div class="row  mb-3">
                                @foreach ($itnews as $news)
                                    <div class="col-md-6 ps-0 ">

                                        <div class="youtube-new-img">
                                            <a href="{{ route('newsDetail', $news->id) }}">
                                                <img class="img-fluid w-100 h-50  mb-2"
                                                    src="{{ url('images/news/' . $news->news_image) }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-0 ">
                                        <div class="ps-0">
                                            <p class=""><a href="{{ route('newsDetail', $news->id) }}">
                                                    {{ $news->title }}</a> </p>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>
                    {{-- it news end --}}

                    {{-- religioius news start --}}
                    <div class="col-md-3">
                        @php
                            $religion_id = Category::where('slug', 'ধর্ম')->first();
                        @endphp

                        <div class=" d-flex justify-content-between border-toop">
                            <div class="boder-text1">
                                <span class="fw-bold">ধর্ম</span>
                            </div>
                            <a href="{{ route('categoryDetails', $religion_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        </div>
                        @if (!empty($relegiousNews))
                            @foreach ($relegiousNews as $key => $news)
                                @if ($loop->first)
                                    <img src="{{ url('images/news/' . $news->news_image) }}"
                                        class="img-fluid border-top">
                                    <p><a href="{{ route('newsDetail', $news->id) }}">
                                            {{ $news->title }}</a></p>
                                @endif
                            @endforeach
                            <div class="row  mb-3">
                                @foreach ($relegiousNews as $news)
                                    <div class="col-md-6 ps-0 ">

                                        <div class="youtube-new-img">
                                            <a href="{{ route('newsDetail', $news->id) }}">
                                                <img class="img-fluid w-100 h-50  mb-2"
                                                    src="{{ url('images/news/' . $news->news_image) }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-0 ">
                                        <div class="ps-0">
                                            <p class=""><a href="{{ route('newsDetail', $news->id) }}">
                                                    {{ $news->title }}</a> </p>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>
                    {{-- religous news end --}}

                    {{-- jobs news start --}}
                    <div class="col-md-3">

                        @php
                            $jobs_id = Category::where('slug', 'জবস')->first();
                            
                        @endphp
                        <div class=" d-flex justify-content-between border-toop">
                            <div class="boder-text1">
                                <span class="fw-bold">জবস</span>
                            </div>
                            <a href="{{ route('categoryDetails', $jobs_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        </div>
                        @if (!empty($jobs))
                            @foreach ($jobs as $key => $news)
                                @if ($loop->first)
                                    <img src="{{ url('images/news/' . $news->news_image) }}"
                                        class="img-fluid border-top">
                                    <p><a href="{{ route('newsDetail', $news->id) }}">
                                            {{ $news->title }}</a></p>
                                @endif
                            @endforeach
                            <div class="row  mb-3">
                                @foreach ($jobs as $news)
                                    <div class="col-md-6 ps-0 ">

                                        <div class="youtube-new-img">
                                            <a href="{{ route('newsDetail', $news->id) }}">
                                                <img class="img-fluid w-100 h-50  mb-2"
                                                    src="{{ url('images/news/' . $news->news_image) }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-0 ">
                                        <div class="ps-0">
                                            <p class=""><a href="{{ route('newsDetail', $news->id) }}">
                                                    {{ $news->title }}</a> </p>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>
                    {{-- jobs news end --}}
                </div>
            </div>
        </div>


        </div>
    </section>
    <!-- feature-news end -->




@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#poll_result').click(function() {
                $('#poll_result_div').removeClass('d-none');
                $('#poll_vote_div').addClass('d-none');
            });
            $('#poll_vote').click(function() {
                $('#poll_vote_div').removeClass('d-none');
                $('#poll_result_div').addClass('d-none');
            });

            //radio button
            $('#is_yes').click(function() {
                $('#is_no').prop('checked', false);
                $('#no_comment').prop('checked', false);
            });

            $('#is_no').click(function() {
                $('#is_yes').prop('checked', false);
                $('#no_comment').prop('checked', false);
            });
            $('#no_comment').click(function() {
                $('#is_yes').prop('checked', false);
                $('#is_no').prop('checked', false);
            });

        });
    </script>
@endsection
