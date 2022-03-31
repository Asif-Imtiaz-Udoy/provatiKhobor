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
                        <img class="w-100 mb-20 img-fluid" src="{{ url('assets/frontend/images/test/advertise-1.png') }}" alt="Advertisement">
                    </a>
                    <a href="#">
                        <img class="w-100 img-fluid" src="{{ url('assets/frontend/images/test/advertise-3.png') }}" alt="Advertisement">
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-8">
                            <div style="height: 70%;" class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column justify-content-center">
                                        <div class="news-heading">
                                            <p class="text-center border-bottom"><a href="news-details.html"> রাজধানীর মিরপুর থেকে
                                                    সকাল ১০ টায় বের হয়ে রওনা দেন </a>
                                            </p>
                                        </div>
                                        <div class="news-heading">
                                            <p class="text-center border-bottom">রাজধানীর মিরপুর থেকে সকাল ১০ টায় বের হয়ে রওনা দেন
                                            </p>
                                        </div>
                                        <div class="news-heading">
                                            <p class="text-center border-bottom">রাজধানীর মিরপুর থেকে সকাল ১০ টায় বের হয়ে রওনা দেন
                                            </p>
                                        </div>
                                        <div class="news-heading">
                                            <p class="text-center border-bottom">রাজধানীর মিরপুর থেকে সকাল ১০ টায় বের হয়ে রওনা দেন
                                            </p>
                                        </div>
                                        <div class="news-heading">
                                            <p class="text-center border-bottom">রাজধানীর মিরপুর থেকে সকাল ১০ টায় বের হয়ে রওনা দেন
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-slider h-100">
                                        <div style="height: 380px;" class="lead-news">
                                            <a href="#">
                                                <img class="h-100 img-fluid" src="{{ url('assets/frontend/images/test/news-4.jpg') }}" alt="lead news">
                                                <p class="lh-1 py-2">এক কাজেই দিন পার</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-white py-3">
                                <div class="breaking-heading">
                                    <h5 class="text-center text-main">খাস খবর</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="px-1 py-2 bg-white d-flex align-items-center justify-content-between border-top border-bottom border-2">
                                        <a href="#">
                                            <div class="thumbnail-rounded rounded-circle overflow-hidden">
                                                <img class="h-100 img-fluid" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                            </div>
                                        </a>
                                        <div class="details">
                                            <p class="lh-1 mb-0 text-left fs-6 text-main">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ</p>
                                            <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="px-1 py-2 bg-white d-flex align-items-center justify-content-between border-top border-bottom border-2">
                                        <a href="#">
                                            <div class="thumbnail-rounded rounded-circle overflow-hidden">
                                                <img class="h-100 img-fluid" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                            </div>
                                        </a>
                                        <div class="details">
                                            <p class="lh-1 mb-0 text-left fs-6 text-main">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ</p>
                                            <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="news-box bg-white pb-1 mb-2">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="News Box">
                                    <h6 class="mb-1 text-center text-dark">এক কাজেই দিন পার</h6>
                                </a>
                                <p class="fs-6 lh-1 px-2 mb-0">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ রাজধানীর মিরপুর থেকে সকাল ১০ টায় বের হয়ে রওনা দেন...</p>
                            </div>
                            <div class="news-box bg-white pb-1 mb-2">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-3.jpg') }}" alt="News Box">
                                    <h6 class="text-center text-dark">এক কাজেই দিন পার</h6>
                                </a>
                                <p class="fs-6 lh-1 px-2 mb-0">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ রাজধানীর মিরপুর থেকে সকাল ১০ টায় বের হয়ে রওনা দেন...</p>
                            </div>
                            <div class="news-box bg-white pb-1 mb-2">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="News Box">
                                    <h6 class="text-center text-dark">এক কাজেই দিন পার</h6>
                                </a>
                                <p class="fs-6 lh-1 px-2 mb-0">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ রাজধানীর মিরপুর থেকে সকাল ১০ টায় বের হয়ে রওনা দেন...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 ps-0">
                    <div class="latest border bg-light">
                        <div class="latest-heading">
                            <h5 class="text-center py-2 bg-main text-white">সর্বশেষ/সর্বাধিক পঠিত</h5>
                        </div>
                            <div class="list-news-item bg-white ptb-10">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-fluid w-100" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="news image">
                                    </a>
                                </div>
                                <a class="text-left lh-1" href="#">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ</a>
                            </div>
                            <div class="w-100 d-flex justify-content-center py-2"><div class="divider"></div></div>
                            <div class="list-news-item bg-white ptb-10">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-fluid w-100" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="news image">
                                    </a>
                                </div>
                                <a class="text-left lh-1" href="#">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ</a>
                            </div>
                            <div class="w-100 d-flex justify-content-center py-2"><div class="divider"></div></div>
                            <div class="list-news-item bg-white ptb-10">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-fluid w-100" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="news image">
                                    </a>
                                </div>
                                <a class="text-left lh-1" href="#">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ</a>
                            </div>
                            <div class="w-100 d-flex justify-content-center py-2"><div class="divider"></div></div>
                            <div class="list-news-item bg-white ptb-10">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-fluid w-100" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="news image">
                                    </a>
                                </div>
                                <a class="text-left lh-1" href="#">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ</a>
                            </div>
                            <div class="w-100 d-flex justify-content-center py-2"><div class="divider"></div></div>
                            <div class="list-news-item bg-white ptb-10">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="img-fluid w-100" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="news image">
                                    </a>
                                </div>
                                <a class="text-left lh-1" href="#">দেশে ফেসবুক ব্যবহারকারী ৪ কোটি ৮০ লাখ</a>
                            </div>
                            <div class="w-100 d-flex justify-content-center py-2"><div class="divider"></div></div>
                    </div>
                    <div class="job-notice">
                        <div class="latest-heading">
                            <h6 class="text-center bg-section mb-0">চাকরি/নোটিশ/বিজ্ঞাপন</h6>
                        </div>
                        <a href="#">
                            <img class="img-fluid" src="{{ url('assets/frontend/images/test/job.png') }}" alt="Job Notice">
                        </a>
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
            <div class="row">
                <div class="sec-heading border-top border-3 position-relative">
                    <h3>সফল যারা</h3>
                    <a href="#" class="extra lh-1 border border-3"><i class="zmdi zmdi-long-arrow-right"></i></a>
                </div>
                <div class="row py-3">
                    <div class="col-lg-4 mt-3">
                        <div class="successful-item bg-white d-flex align-items-center justify-content-around">
                            <div class="details">
                                <p class="lh-1 mb-0">বিনম্র শ্রদ্ধা ও ভালোবাসা</p>
                                <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                <p class="lh-1 mb-0 fs-6">আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া</p>
                            </div>
                            <a href="#">
                                <div class="thumbnail rounded-circle overflow-hidden">
                                    <img class="h-100 img-fluid" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="successful-item bg-white d-flex align-items-center justify-content-around">
                            <div class="details">
                                <p class="lh-1 mb-0">বিনম্র শ্রদ্ধা ও ভালোবাসা</p>
                                <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                <p class="lh-1 mb-0 fs-6">আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া</p>
                            </div>
                            <a href="#">
                                <div class="thumbnail rounded-circle overflow-hidden">
                                    <img class="h-100 img-fluid" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="successful-item bg-white d-flex align-items-center justify-content-around">
                            <div class="details">
                                <p class="lh-1 mb-0">বিনম্র শ্রদ্ধা ও ভালোবাসা</p>
                                <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                <p class="lh-1 mb-0 fs-6">আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া</p>
                            </div>
                            <a href="#">
                                <div class="thumbnail rounded-circle overflow-hidden">
                                    <img class="h-100 img-fluid" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                </div>
                            </a>
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

    <!------ Develope start ------>
    <section class="develop-partner mt-30">
        <div class="container">
            <div class="row">
                <div class="sec-heading border-top border-3 position-relative">
                    <h3>উন্নয়ন অংশীদার</h3>
                    <a href="#" class="extra lh-1 border border-3"><i class="zmdi zmdi-long-arrow-right"></i></a>
                </div>
                <div class="row py-3">
                    <div class="col-lg-4 mt-3">
                        <div class="develop-item d-flex align-items-center">
                            <div class="details bg-white w-75 h-100 p-3">
                                <p class="lh-1 mb-0">বিনম্র শ্রদ্ধা ও ভালোবাসা</p>
                                <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                <p class="lh-1 mb-0 fs-6">আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া</p>
                            </div>
                            <div class="thumbnail overflow-hidden text-center w-25 h-100">
                                <a href="#">
                                    <img class="w-100 h-100" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="develop-item d-flex align-items-center">
                            <div class="details bg-white w-75 h-100 p-3">
                                <p class="lh-1 mb-0">বিনম্র শ্রদ্ধা ও ভালোবাসা</p>
                                <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                <p class="lh-1 mb-0 fs-6">আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া</p>
                            </div>
                            <div class="thumbnail overflow-hidden text-center w-25 h-100">
                                <a href="#">
                                    <img class="w-100 h-100" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="develop-item d-flex align-items-center">
                            <div class="details bg-white w-75 h-100 p-3">
                                <p class="lh-1 mb-0">বিনম্র শ্রদ্ধা ও ভালোবাসা</p>
                                <a class="text-info" href="#">মাহমুদ আহমেদ</a>
                                <p class="lh-1 mb-0 fs-6">আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া</p>
                            </div>
                            <div class="thumbnail overflow-hidden text-center w-25 h-100">
                                <a href="#">
                                    <img class="w-100 h-100" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" alt="thumbnail">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------ Develope end ------>

    <!------ Advertisement start ------>
    <section class="advertisement mt-30">
        <div class="container">
            <a href="#">
                <img class="w-100 img-fluid" src="{{ asset('assets/frontend/images/test/advertise.png') }}" alt="Advertisement">
            </a>
        </div>
    </section>
    <!------ Advertisement end ------>

        <!------ Opinion start ------>
        <section class="mt-30">
            <div class="container">
                <div class="bg-section">
                    <h4 class="ps-3">মতামত</h4>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="p-3 pb-1 mb-2">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="News Box">
                                </a>
                                <a href="#" class="p-2">এক কাজেই দিন পার</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="p-3 pb-1 mb-2">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="News Box">
                                </a>
                                <a href="#" class="p-2">এক কাজেই দিন পার</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="p-3 pb-1 mb-2">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="News Box">
                                </a>
                                <a href="#" class="p-2">এক কাজেই দিন পার</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="p-3 pb-1 mb-2">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" alt="News Box">
                                </a>
                                <a href="#" class="p-2">এক কাজেই দিন পার</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------ Opinion end ------>

    <!------ Advertisement start ------>
    <section class="advertisement mt-30">
        <div class="container">
            <a href="#">
                <img class="w-100 img-fluid" src="{{ asset('assets/frontend/images/test/advertise.png') }}" alt="Advertisement">
            </a>
        </div>
    </section>
    <!------ Advertisement end ------>

        <!------ Feature Category start ------>
        <section class="mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 position-relative">
                        <div class="feature-slider">
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="bg-main px-3 py-1 text-white" href="#">
                                রাজনীতি
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 position-relative">
                        <div class="feature-slider">
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="bg-main px-3 py-1 text-white" href="#">
                                রাজনীতি
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 position-relative">
                        <div class="feature-slider">
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                            <div class="p-3 pb-1 mb-2 text-center">
                                <a href="#">
                                    <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg')  }}" alt="News Box">
                                    <h5 class="text-center mb-0">এক কাজেই দিন পার এই টাইটেল টা একটু বড়</h5>
                                </a>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="bg-main px-3 py-1 text-white" href="#">
                                রাজনীতি
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <aside>
                            <div class="card">
                                <div class="card-header">
                                    <p class="mb-0 text-center">নামাজের সময়সূচি</p>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-success table-bordered border-white">
                                        <tbody>
                                          <tr>
                                              <td rowspan="5" class="text-center align-middle">
                                                  <img class="img-fluid" src="{{ url('assets/frontend/images/test/prayer.png') }}" alt="Prayer">
                                              </td>
                                            <td class="text-center">ফজর</td>
                                            <td class="text-center">৫.০০</td>
                                          </tr>
                                          <tr>
                                            <td class="text-center">জোহর</td>
                                            <td class="text-center">৫.০০</td>
                                          </tr>
                                          <tr>
                                            <td class="text-center">আছর</td>
                                            <td class="text-center">৫.০০</td>
                                          </tr>
                                          <tr>
                                            <td class="text-center">মাগরিব</td>
                                            <td class="text-center">৫.০০</td>
                                          </tr>
                                          <tr>
                                            <td class="text-center">এশা</td>
                                            <td class="text-center">৫.০০</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                            <div class="border p-2 bg-section">
                                <p class="pt-20"> আপনার ভোট আপনি দিন যাকে খুশি তাকে দিন। নিচের ভোটে অংশগ্রহণ করুন
                                    মূল্যবান মতামত দিন।
                                </p>
                                <div class="pb-3 d-flex justify-content-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">হ্যা</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">না</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">মন্তব্য নাই</label>
                                    </div>
                                </div>
    
                                <div class="pb-3 d-flex justify-content-center">
                                    <button class="btn btn-success mr-20">মতামত দিন</button> <button class="btn btn-danger">জরিপের
                                        ফলাফল</button>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!------ Feature Category end ------>

    <!------ Photo gallery start ------>
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
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-1.jpg') }}" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-2.jpg') }}" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-3.jpg') }}" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-4.jpg') }}" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{ url('assets/frontend/images/test/news-5.jpg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!------ Photo gallery end ------>


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
