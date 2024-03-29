@extends('layouts.frontend')

@section('content')
    <!------ Lead news start ------>
    <section class="lead">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-2">
                    @if (!empty($advertisements))
                        @foreach ($advertisements as $key => $advertisement)
                            @if ($advertisement->ad_category == 1)
                                <a href="{{ $advertisement->link }}">
                                    <img class="w-100 mb-20 img-fluid"
                                        src="{{ url('images/advertisement/' . $advertisement->add_image) }}"
                                        alt="Advertisement">
                                </a>
                            @endif
                        @endforeach
                    @endif

                    @if (!empty($advertisements))
                        @foreach ($advertisements as $key => $advertisement)
                            @if ($advertisement->ad_category == 2)
                                <a href="#">
                                    <img class="w-100 img-fluid"
                                        src="{{ url('images/advertisement/' . $advertisement->add_image) }}"
                                        alt="Advertisement">
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div> --}}
                <div class="col-lg-10">
                    <div class="row">
                        @if (!empty($lead_newses))
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="d-flex flex-column justify-content-center">
                                            @foreach ($lead_newses as $lead)
                                                <div class="news-heading">
                                                    <p class="text-center border-bottom"><a
                                                            href="{{ route('newsDetail', $lead->id) }}">
                                                            {{ $lead->title }}</a>
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="feature-slider h-100">
                                            @foreach ($lead_newses as $lead)
                                                <div style="height: 380px;" class="lead-news">
                                                    <a href="{{ route('newsDetail', $lead->id) }}">
                                                        <img class="h-100 img-fluid"
                                                            src="{{ url('images/news/' . $lead->news_image) }}"
                                                            alt="lead news">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if (!empty($breakings))
                                    <div class="row bg-white py-4 mt-3">
                                        <div class="breaking-heading">
                                            <h5 class="text-center text-main">খাস খবর</h5>
                                        </div>
                                        @foreach ($breakings as $breaking)
                                            <div class="col-lg-6">
                                                <div
                                                    class="px-1 py-2 bg-white d-flex align-items-center justify-content-between border-top border-bottom border-2">
                                                    <a href="{{ route('newsDetail', $breaking->id) }}">
                                                        <div class="thumbnail-rounded rounded-circle overflow-hidden">
                                                            <img class="h-100 img-fluid"
                                                                src="{{ url('images/news/' . $breaking->news_image) }}"
                                                                alt="thumbnail">
                                                        </div>
                                                    </a>
                                                    <div class="details">
                                                        <p class="lh-1 mb-0 text-left fs-6 text-main" style="font-weight: 500;
                                                                                    text-align: justify;
                                                                                    padding-left: 3px;">
                                                            <a class="pl-2"
                                                                href="{{ route('newsDetail', $breaking->id) }}"><b>{!! mb_substr(strip_tags($breaking->title), 0, 35, 'UTF-8') !!}...</b></a>
                                                        </p>
                                                        <p class="fs-6 lh-1 px-2 mb-0 pt-3">{!! mb_substr(strip_tags($breaking->news_body), 0, 100, 'UTF-8') !!}...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endif
                        @if (!empty($news_boxes))
                            <div class="col-lg-4">
                                @foreach ($news_boxes as $news_box)
                                    <div class="news-box bg-white pb-1 mb-2">
                                        <a href="{{ route('newsDetail', $news_box->id) }}">
                                            <img class="img-fluid" style="height: 158px;
                                                            width: 100%;"
                                                src="{{ url('images/news/' . $news_box->news_image) }}" alt="News Box">
                                            <h6 class="mb-1 text-center text-dark">{!! mb_substr(strip_tags($news_box->title), 0, 50, 'UTF-8') !!}...</h6>
                                        </a>
                                        {{-- <p class="fs-6 lh-1 px-2 mb-0">{!! mb_substr(strip_tags($news_box->news_body), 0, 50, 'UTF-8') !!}...</p> --}}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                @if (!empty($latest_newses))
                    <div class="col-lg-2 ps-0">
                        <div class="latest border bg-light">
                            <div class="latest-heading">
                                <h5 class="text-center py-2 bg-main text-white">সর্বশেষ/সর্বাধিক পঠিত</h5>
                            </div>
                            @foreach ($latest_newses as $news)
                                <div class="list-news-item bg-white ptb-10">
                                    <div class="thumbnail">
                                        <a href="{{ route('newsDetail', $news->id) }}">
                                            <img class="img-fluid w-100"
                                                src="{{ url('images/news/' . $news->news_image) }}" alt="news image">
                                        </a>
                                    </div>
                                    <a class="text-left lh-1"
                                        href="{{ route('newsDetail', $news->id) }}">{{ $news->title }}</a>
                                </div>
                                <div class="w-100 d-flex justify-content-center py-2">
                                    <div class="divider"></div>
                                </div>
                            @endforeach
                        </div>
                        <div class="job-notice">
                            <div class="latest-heading">
                                <h6 class="text-center bg-section mb-0">চাকরি/নোটিশ/বিজ্ঞাপন</h6>
                            </div>
                            @if (!empty($advertisements))
                                @foreach ($advertisements as $key => $advertisement)
                                    @if ($advertisement->ad_category == 3)
                                        <a href="{{ $advertisement->link }}">
                                            <img class="img-fluid w-100" style="height: 147px;"
                                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}"
                                                alt="Job Notice">
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!------ Lead news end ------>

    <!------ Advertisement start ------>
    @if (!empty($advertisements))
        @foreach ($advertisements as $key => $advertisement)
            @if ($advertisement->ad_category == 4)
                <section class="advertisement mt-30">
                    <div class="container">
                        <a href="{{ $advertisement->link }}">
                            <img class="w-100 img-fluid" style="height: 169px"
                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}" alt="Advertisement">
                        </a>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!------ Advertisement end ------>

    <!------ Video start ------>
    @if (!empty($videos))
        <section class="video mt-30">
            <div class="container">
                <div class="mb-20 sec-heading border-top border-3 position-relative">
                    <h3>ভিডিও</h3>
                    <a href="#" class="extra lh-1 border border-3"><i class="zmdi zmdi-long-arrow-right"></i></a>
                </div>
                <div class="row">
                    @foreach ($videos as $video)
                        <div class="col-lg-3">
                            <div class="video-player py-1 px-4 bg-dark text-center" style="height: 250px;">
                                <iframe class="w-75 h-100 align-middle" src="{{ $video->video_link }}" name="myframe"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!------ Video end ------>

    <!------ Advertisement start ------>
    @if (!empty($advertisements))
        @foreach ($advertisements as $key => $advertisement)
            @if ($advertisement->ad_category == 12)
                <section class="advertisement mt-30">
                    <div class="container">
                        <a href="{{ $advertisement->link }}">
                            <img class="w-100 img-fluid" style="height: 169px"
                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}" alt="Advertisement">
                        </a>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!------ Advertisement end ------>

    <!------ Successful start ------>
    @if (!empty($successfuls))
        <section class="successful mt-30">
            <div class="container">
                <div class="mb-20 sec-heading border-top border-3 position-relative">
                    <h3>সফল যারা</h3>
                    <a href="#" class="extra lh-1 border border-3"><i class="zmdi zmdi-long-arrow-right"></i></a>
                </div>
                <div class="row py-3">
                    @foreach ($successfuls as $successful)
                        <div class="col-lg-4 mt-3">
                            <div class="successful-item bg-white d-flex align-items-center justify-content-around">
                                <div class="details">
                                    <p class="lh-1 mb-0"><b>{{ $successful->title }}</b></p>
                                    <br>
                                    {{-- <a class="text-info"
                                        href="{{ route('newsDetail', $successful->id) }}">{{ $successful->reporter }}</a> --}}
                                    <p class="lh-1 mb-0 fs-6">{!! mb_substr(strip_tags($successful->news_body), 0, 200, 'UTF-8') !!}</p>
                                </div>
                                <a href="{{ route('newsDetail', $successful->id) }}">
                                    <div class="thumbnail rounded-circle overflow-hidden">
                                        <img class="h-100 img-fluid"
                                            src="{{ url('images/news/' . $successful->news_image) }}" alt="thumbnail">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!------ Successful end ------>

    <!------ Advertisement start ------>
    @if (!empty($advertisements))
        @foreach ($advertisements as $key => $advertisement)
            @if ($advertisement->ad_category == 5)
                <section class="advertisement mt-30">
                    <div class="container">
                        <a href="{{ $advertisement->link }}">
                            <img class="w-100 img-fluid" style="height: 169px"
                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}" alt="Advertisement">
                        </a>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!------ Advertisement end ------>

    <!------ Develope start ------>
    @if (!empty($develops))
        <section class="develop-partner mt-30">
            <div class="container">
                <div class="mb-20 sec-heading border-top border-3 position-relative">
                    <h3>উন্নয়ন অংশীদার</h3>
                    <a href="#" class="extra lh-1 border border-3"><i class="zmdi zmdi-long-arrow-right"></i></a>
                </div>
                <div class="row py-3">
                    @foreach ($develops as $develop)
                        <div class="col-lg-4 mt-3">
                            <div class="develop-item d-flex align-items-center">
                                <div class="details bg-white w-75 h-100 p-3">
                                    <p class="lh-1 mb-3 font-weight-bold"><b>{{ $develop->title }}</b></p>
                                    {{-- <a class="text-info"
                                        href="{{ route('newsDetail', $develop->id) }}">{{ $develop->reporter }}</a> --}}
                                    <p class="lh-1 mb-0 fs-6">{!! mb_substr(strip_tags($develop->news_body), 0, 120, 'UTF-8') !!}</p>
                                </div>
                                <div class="thumbnail overflow-hidden text-center w-25 h-100">
                                    <a href="{{ route('newsDetail', $develop->id) }}">
                                        <img class="w-100 h-100"
                                            src="{{ url('images/news/' . $develop->news_image) }}" alt="thumbnail">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!------ Develope end ------>

    <!------ Advertisement start ------>
    @if (!empty($advertisements))
        @foreach ($advertisements as $key => $advertisement)
            @if ($advertisement->ad_category == 6)
                <section class="advertisement mt-30">
                    <div class="container">
                        <a href="{{ $advertisement->link }}">
                            <img class="w-100 img-fluid" style="height: 169px"
                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}" alt="Advertisement">
                        </a>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!------ Advertisement end ------>

    <!------ Opinion start ------>
    @if (!empty($opinions))
        <section class="mt-30">
            <div class="container">
                <div class="bg-section">
                    <h4 class="ps-3">মতামত</h4>
                    <div class="row">
                        @foreach ($opinions as $opinion)
                            <div class="col-lg-3">
                                <div class="p-3 pb-1 mb-2">
                                    <a href="{{ route('newsDetail', $opinion->id) }}">
                                        <img class="img-fluid" style="height:275px;"
                                            src="{{ url('images/news/' . $opinion->news_image) }}" alt="News Box">
                                    </a>
                                    <a href="{{ route('newsDetail', $opinion->id) }}"
                                        class="p-2"><b>{{ $opinion->title }}</b></a>
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
    @if (!empty($advertisements))
        @foreach ($advertisements as $key => $advertisement)
            @if ($advertisement->ad_category == 7)
                <section class="advertisement mt-30">
                    <div class="container">
                        <a href="{{ $advertisement->link }}">
                            <img class="w-100 img-fluid" style="height: 169px"
                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}" alt="Advertisement">
                        </a>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!------ Advertisement end ------>

    <!------ Feature Category start ------>
    <section class="mt-30">
        <div class="container">
            <div class="row">
                @if (!empty($features))
                    @foreach ($features as $key => $feature)
                        <?php
                        $categoryNewses = App\Models\News::where('category_id', $feature->id)
                            ->latest()
                            ->limit(5)
                            ->get();
                        ?>
                        @if ($key >= 3)
                            <div class="col-lg-3 position-relative">
                                <div class="feature-slider">
                                    @foreach ($categoryNewses as $categoryNews)
                                        <div class="p-3 pb-1 mb-2 text-center">
                                            <a href="{{ route('newsDetail', $categoryNews->id) }}">
                                                <img class="img-fluid" style="height:275px;"
                                                    src="{{ url('images/news/' . $categoryNews->news_image) }}"
                                                    alt="News Box">
                                                <h5 class="text-center mb-0">{{ $categoryNews->title }}</h5>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    <a class="bg-main px-3 py-1 text-white"
                                        href="{{ route('categoryDetails', $feature->id) }}">
                                        {{ $feature->name }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!------ Feature Category end ------>

    <!------ Advertisement start ------>
    @if (!empty($advertisements))
        @foreach ($advertisements as $key => $advertisement)
            @if ($advertisement->ad_category == 12)
                <section class="advertisement mt-30">
                    <div class="container">
                        <a href="{{ $advertisement->link }}">
                            <img class="w-100 img-fluid" style="height: 169px"
                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}" alt="Advertisement">
                        </a>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!------ Advertisement end ------>

    <!------ Feature Category start ------>
    @if (!empty($features))
        <section class="mt-30">
            <div class="container">
                <div class="row">
                    @foreach ($features as $key => $feature)
                        <?php $categoryNewses = App\Models\News::where('category_id', $feature->id)
                            ->latest()
                            ->limit(5)
                            ->get(); ?>
                        @if ($key < 3)
                            <div class="col-lg-3 position-relative">
                                <div class="feature-slider">
                                    @foreach ($categoryNewses as $categoryNews)
                                        <div class="p-3 pb-1 mb-2 text-center">
                                            <a href="{{ route('newsDetail', $categoryNews->id) }}">
                                                <img class="img-fluid" style="height:275px;"
                                                    src="{{ url('images/news/' . $categoryNews->news_image) }}"
                                                    alt="News Box">
                                                <h5 class="text-center mb-0">{{ $categoryNews->title }}</h5>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    <a class="bg-main px-3 py-1 text-white"
                                        href="{{ route('categoryDetails', $feature->id) }}">
                                        {{ $feature->name }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-lg-3">
                        <aside>
                            @if (!empty($prayer))
                                <div class="card">
                                    <div class="card-header">
                                        <p class="mb-0 text-center">নামাজের সময়সূচি</p>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-success table-bordered border-white">
                                            <tbody>
                                                <tr>
                                                    <td rowspan="5" class="text-center align-middle">
                                                        <img class="img-fluid"
                                                            src="{{ url('assets/frontend/images/test/prayer.png') }}"
                                                            alt="Prayer">
                                                    </td>
                                                    <td class="text-center">ফজর</td>
                                                    <td class="text-center">{{ $prayer->fozor }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">জোহর</td>
                                                    <td class="text-center">{{ $prayer->johor }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">আছর</td>
                                                    <td class="text-center">{{ $prayer->ashor }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">মাগরিব</td>
                                                    <td class="text-center">{{ $prayer->magriv }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">এশা</td>
                                                    <td class="text-center">{{ $prayer->esha }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($poll))
                                <div class="border p-2 bg-section">
                                    <p class="pt-20"> {{ $poll->question }}
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
                        </aside>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @endif
    <!------ Feature Category end ------>

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
                                @foreach ($photos as $photo)
                                    <div class="swiper-slide">
                                        <img class="img-fluid"
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

    <!------ Advertisement start ------>
    @if (!empty($advertisements))
        @foreach ($advertisements as $key => $advertisement)
            @if ($advertisement->ad_category == 8)
                <section class="advertisement mt-30">
                    <div class="container">
                        <a href="{{ $advertisement->link }}">
                            <img class="w-100 img-fluid" style="height: 169px"
                                src="{{ url('images/advertisement/' . $advertisement->add_image) }}" alt="Advertisement">
                        </a>
                    </div>
                </section>
            @endif
        @endforeach
    @endif
    <!------ Advertisement end ------>
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
