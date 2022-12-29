@extends('layouts.frontend')

@section('content')
    @php
        use App\Models\Category;
    @endphp


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    @if (!empty($advertisements))
                        @foreach ($advertisements as $advertisement)
                            @if ($advertisement->ad_category == 1)
                                @if ($advertisement->add_type == 1)
                                    <a class="text-center m-auto" href="{{ $advertisement->link }}">
                                        <img class="rounded img-fluid w-100"
                                            src="{{ url('/images/advertisement', $advertisement->add_image) }}"
                                            alt="" />
                                    </a>
                                @else
                                    {{ $advertisement->add_script }}
                                @endif
                            @endif
                        @endforeach
                </div>
                @endif
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>




    <!--  banner start -->
    <section>
        <div class="banner-sec mt-3">
            <div class="container">
                <div class="row">
                    @if (!empty($main_lead_newses))
                        @foreach ($main_lead_newses as $lead)
                            <div class="col-lg-6 col-sm-12 col-md-6 banner-img">
                                <div class="national-bg-min2">
                                </div>
                                <div class="cometion-img text-center pb-3 ps-2 pe-2 pt-3 minus-margin2">
                                    <img class="img-fluid rounded" src="{{ url('images/news/' . $lead->news_image) }}"
                                        alt="img.png">

                                    <p class="text-center text-danger text-danger fs-4 fw-bold"> <a
                                            href="{{ route('newsDetail', $lead->id) }}">
                                            {{ $lead->title }}</a></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="row">
                            @if (!empty($news_boxes))
                                @foreach ($news_boxes as $key => $lead)
                                    <div class="col-lg-6 col-sm-12 col-md-6">
                                        <div class="bgcolor p-2">
                                            <div class="row">
                                                <div class="col-md-8 pe-0">

                                                    <div class="news-text ">
                                                        <p class="text-left fs-5" style="line-height: 30px;"><a
                                                                href="{{ route('newsDetail', $lead->id) }}">
                                                                {{ mb_substr($lead->title, 0, 40) }}..</a> </p>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 ps-0 pe-1">
                                                    <div class="news-img text-center pe-1">
                                                        <img class="rounded img-fluid w-100"
                                                            src="{{ url('images/news/' . $lead->news_image) }}">
                                                        <p class="text-danger mb-0"><i style="font-size: 10px;"
                                                                class="fa-solid fa-clock"></i><span style="font-size: 12px;"
                                                                class="text-danger">
                                                                {{ $lead->created_at->diffForHumans() }}
                                                            </span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($key == 5)
                                    @break;
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
</section>
<!--  banner end -->




<!--  top news start -->
<section>
    <div class="top-news-sec mb-5">
        <div class="container">
            <div class="row">
                @if (!empty($news_boxes))
                    @foreach ($news_boxes as $key => $lead)
                        @if ($key > 5)
                            <div class="col-md-3 pt-4 mb-4">
                                <div class="bgcolor p-2">
                                    <div class="row">
                                        <div class="col-md-8 pe-0">

                                            <div class="news-text ">
                                                <p class="text-left fs-5" style="line-height: 30px;"><a
                                                        href="{{ route('newsDetail', $lead->id) }}">
                                                        {{ mb_substr($lead->title, 0, 40) }}..</a> </p>

                                            </div>
                                        </div>
                                        <div class="col-md-4 ps-0 pe-1">
                                            <div class="news-img text-center pe-1">
                                                <img class="rounded img-fluid w-100"
                                                    src="{{ url('images/news/' . $lead->news_image) }}">
                                                <p class="text-danger mb-0"><i style="font-size: 10px;"
                                                        class="fa-solid fa-clock"></i><span style="font-size: 12px;"
                                                        class="text-danger"> {{ $lead->created_at->diffForHumans() }}
                                                    </span></p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        @endif
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

            <div class="youtube-img d-flex justify-content-center pt-4">
                <div class="boder mb-4 align-items-center">

                </div>
                <div class="youtube-image-logo"><img class="rounded img-fluid"
                        src="{{ url('assets/frontend/images/test/youtube.png') }}"></div>
                <div class="boder mb-4 align-items-center">

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
                                            <p class="text-black fs-5 pt-2 text-left" style="line-height:28px;">
                                                <b>{{ $video->caption }}</b>
                                            </p>

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
                                            <p class="text-black fs-5 pt-2 text-left" style="line-height:28px;">
                                                <b>{{ $video->caption }}</b>
                                            </p>

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


<!--  archaive and prodesh start -->
<section>
    <div class="top-news-sec mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt-4 mb-4">
                    <form action="{{ route('prodesh') }}" method="post">
                        @csrf

                        <select class="form-select" aria-label="Default select example" name="prodesh_id">
                            <option selected>প্রদেশ নির্বাচন করুন</option>
                            @foreach ($prodeshes as $prodesh)
                                <option value="{{ $prodesh->id }}">{{ $prodesh->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-info w-100 mt-3">দেখুন</button>
                    </form>
                </div>
                <div class="col-md-4 pt-4 mb-4">
                    @if (!empty($poll))
                        <div class="border p-2 bg-section">
                            <p class="pt-3 text-center"> {{ $poll->question }}
                            </p>
                            <div class="pb-3 d-flex justify-content-center">
                                <form action="{{ route('poll.vote', $poll->id) }}" method="POST">
                                    @csrf
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_yes" id="is_yes"
                                            value="option1">
                                        <label class="form-check-label" for="is_yes">হ্যা</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_no" id="is_no"
                                            value="option2">
                                        <label class="form-check-label" for="is_no">না</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="no_comment"
                                            id="no_comment" value="option2">
                                        <label class="form-check-label" for="no_comment">মন্তব্য নাই</label>
                                    </div>
                                    <div class="pb-3 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success mr-20">মতামত দিন</button>
                                        <a href="javaScript:void(0)" class="btn btn-danger" id="poll_result">জরিপের
                                            ফলাফল</a>
                                    </div>
                                </form>

                            </div>
                            <div id="poll_result_div" class="col-lg-12 side-border d-none">
                                @php
                                    $total = $poll->is_yes + $poll->is_no + $poll->no_comment;
                                @endphp
                                <span class="d-block pl-5">সর্বমোট ভোটঃ {{ $total }} টি</span>
                                <label class="form-label pl-5">হ্যা</label>
                                <div class="progress bg-white">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ number_format(($poll->is_yes / ($total == 0 ? 1 : $total)) * 100, 2, '.', '') }}%;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        {{ number_format(($poll->is_yes / ($total == 0 ? 1 : $total)) * 100, 2, '.', '') }}%
                                    </div>
                                </div>
                                <label class="form-label pl-5">না</label>
                                <div class="progress bg-white">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ number_format(($poll->is_no / ($total == 0 ? 1 : $total)) * 100, 2, '.', '') }}%;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        {{ number_format(($poll->is_no / ($total == 0 ? 1 : $total)) * 100, 2, '.', '') }}%
                                    </div>
                                </div>
                                <label class="form-label pl-5">মন্তব্য
                                    নাই</label>
                                <div class="progress bg-white">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ number_format(($poll->no_comment / ($total == 0 ? 1 : $total)) * 100, 2, '.', '') }}%;"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        {{ number_format(($poll->no_comment / ($total == 0 ? 1 : $total)) * 100, 2, '.', '') }}%
                                    </div>
                                </div>
                                <div class="py-3 d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary" id="poll_vote">
                                        ভোট দিন
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-4 pt-4 mb-4">

                    <h2 class="py-2">বিগত দিনের সংবাদ দেখুন</h2>
                    <form action="{{ route('date') }}" method="post">
                        @csrf
                        <div class="input-group date" id="datepicker">
                            <input type="date" class="form-control datepicker" id="date" name='date'
                                required pattern="dd/mm/yyyy" />

                            <button class="btn btn-info w-100 mt-3">দেখুন</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
</section>
<!--  archaive and prodesh end -->



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
                                                <img class="rounded img-fluid ps-3 h-100 "
                                                    src="{{ url('images/news/' . $news->news_image) }}">

                                            </div>
                                            <h4 class="text-danger ps-3 pt-1"><a
                                                    href="{{ route('newsDetail', $news->id) }}">
                                                    {{ $news->title }}</a></h4>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="col-md-6 minus-margin">
                                    @php
                                        $national_id = Category::where('slug', 'জাতীয়')->first();
                                    @endphp
                                    <div class="national-news">
                                        <div class="row">
                                            <div class="col-md-12 read-more">
                                                @if ($national_id)
                                                    <a href="{{ route('categoryDetails', $national_id->id) }} ? {{ route('categoryDetails', $national_id->id) }} : ''"
                                                        class="d-flex justify-content-end align-items-center">
                                                        <span class="text-md-white text-dark">আরো পড়ুন</span>
                                                        <i
                                                            class="fa-solid fa-caret-right text-md-white text-dark mt-1 ps-2"></i>
                                                    </a>
                                                @endif

                                            </div>
                                            @foreach ($nationals as $key => $news)
                                                @if ($key > 0)
                                                    <div class="col-md-8 mt-2 text-lg-start text-center">
                                                        <div class="nation-text">
                                                            <p class="mb-0"><a
                                                                    href="{{ route('newsDetail', $news->id) }}">
                                                                    {{ $news->title }}</a></p>
                                                            <p style="line-height: 2px;" class="text-danger mb-0"><i
                                                                    style="font-size: 10px;"
                                                                    class="fa-solid fa-clock"></i><span
                                                                    style="font-size: 10px;" class="text-danger"> 6
                                                                    hour
                                                                    ago</span></p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{ route('newsDetail', $news->id) }}">
                                                            <img class="rounded img-fluid pt-3 w-100 rounded-top"
                                                                src="{{ url('images/news/' . $news->news_image) }}">
                                                        </a>
                                                    </div>
                                                @endif
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
                                                <img class="rounded img-fluid ps-3 h-100 rounded-top"
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
                                                    <span class="text-md-white text-dark">আরো পড়ুন</span>
                                                    <i
                                                        class="fa-solid fa-caret-right text-md-white text-dark mt-1 ps-2"></i>
                                                </a>

                                            </div>
                                            @foreach ($internationals as $key => $news)
                                                @if ($key > 0)
                                                    <div class="col-md-8 mt-2 text-lg-start text-center">
                                                        <div class="nation-text">
                                                            <p class="mb-0"><a
                                                                    href="{{ route('newsDetail', $news->id) }}">
                                                                    {{ $news->title }}</a></p>
                                                            <p style="line-height: 2px;" class="text-danger mb-0"><i
                                                                    style="font-size: 10px;"
                                                                    class="fa-solid fa-clock"></i><span
                                                                    style="font-size: 10px;" class="text-danger"> 6
                                                                    hour
                                                                    ago</span></p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{ route('newsDetail', $news->id) }}">
                                                            <img class="rounded img-fluid pt-3 w-100"
                                                                src="{{ url('images/news/' . $news->news_image) }}">
                                                        </a>
                                                    </div>
                                                @endif
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
                                                <img class="rounded img-fluid ps-3 h-100 "
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
                                                    <span class="text-md-white text-dark">আরো পড়ুন</span>
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
                                                        <img class="rounded img-fluid pt-3 w-100"
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
                                                <img class="rounded img-fluid ps-3 h-100 "
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
                                                    <span class="text-md-white text-dark">আরো পড়ুন</span>
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
                                                        <img class="rounded img-fluid pt-3 w-100"
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
<section style="background: #f9f9f9">
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
                        @if (!empty($life_id))
                            <a href=" {{ route('categoryDetails', $life_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        @endif

                    </div>
                    @if (!empty($lifestyles))
                        @foreach ($lifestyles as $key => $news)
                            @if ($loop->first)
                                <img src="{{ url('images/news/' . $news->news_image) }}"
                                    class="rounded img-fluid border-top rounded-top">
                                <p><a href="{{ route('newsDetail', $news->id) }}">
                                        {{ $news->title }}</a></p>
                            @endif
                        @endforeach
                        <div class="row  mb-3">
                            @foreach ($lifestyles as $news)
                                <div class="col-md-6 ps-0 ">

                                    <div class="youtube-new-img">
                                        <a href="{{ route('newsDetail', $news->id) }}">
                                            <img class="rounded img-fluid w-100 h-50  mb-2"
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
                        @if ($it_id)
                            <a href="{{ route('categoryDetails', $it_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        @endif
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
                                            <img class="rounded img-fluid w-100 h-50  mb-2"
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
                        @if ($religion_id)
                            <a href="{{ route('categoryDetails', $religion_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        @endif
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
                                            <img class="rounded img-fluid w-100 h-50  mb-2"
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
                        @if ($jobs_id)
                            <a href="{{ route('categoryDetails', $jobs_id->id) }}" class="boder-text2">
                                <span>আরো পড়ুন</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        @endif
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
                                            <img class="rounded img-fluid w-100 h-50  mb-2"
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



<!------ Photo gallery start ------>
@if (!empty($photos))
    <section class="photo-gallery mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="title d-flex justify-content-between align-items-center">
                        <div style="background: #00D7FF" class="swiper-prev"><i class="zmdi zmdi-caret-left"></i>
                        </div>
                        <h2 class="mb-0">ফটো গ্যালারি</h2>
                        <div style="background: #00D7FF" class="swiper-next"><i class="zmdi zmdi-caret-right"></i>
                        </div>
                    </div>
                    <div class="swiper mySwiper ptb-30">
                        <div class="swiper-wrapper">
                            @foreach ($photos as $photo)
                                <div class="swiper-slide">
                                    <img class="rounded img-fluid"
                                        src="{{ url('images/multimedia/' . $photo->photo) }}" />
                                    <h5 class="text-center"><b>{{ $photo->caption }}</b></h5>
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


    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script>
@endsection
