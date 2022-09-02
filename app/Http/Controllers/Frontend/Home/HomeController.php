<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Multimedia;
use App\Models\News;
use App\Models\Poll;
use App\Models\Prayer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $main_lead_newses = News::where('lead_news', 1)->latest('created_at')->limit(1)->get();
        $lead_newses = News::where('lead_news', 1)->latest('created_at')->limit(8)->get();
        $latest_newses = News::latest('created_at')->limit(5)->get();
        $nationals = News::where('category_slug', 'জাতীয়')->latest('created_at')->limit(4)->get();
        $internationals = News::where('category_slug', 'আর্ন্তজাতিক')->latest('created_at')->limit(4)->get();
        $plays = News::where('category_slug', 'খেলাধুলা')->latest('created_at')->limit(4)->get();
        $entertainments = News::where('category_slug', 'বিনোদন')->latest('created_at')->limit(4)->get();
        $lifestyles = News::where('category_slug', 'লাইফস্টাইল')->latest('created_at')->limit(3)->get();
        $itnews = News::where('category_slug', 'তথ্যপ্রযুক্তি')->latest('created_at')->limit(3)->get();
        $relegiousNews = News::where('category_slug', 'ধর্ম')->latest('created_at')->limit(3)->get();
        $jobs = News::where('category_slug', 'জবস')->latest('created_at')->limit(3)->get();

        $news_boxes = News::where('news_box', 1)->latest()->limit(3)->get();
        $features = Category::where('feature', 1)->get();
        $photos = Multimedia::orderBy('id', 'DESC')->where('category', 1)->limit(10)->get();
        $videos = Multimedia::where('category', 2)->latest('created_at')->limit(5)->get();
        $opinions = News::where('type', 1)->latest('created_at')->limit(4)->get();
        $successfuls = News::where('type', 2)->latest('created_at')->limit(3)->get();
        $develops = News::where('type', 4)->latest('created_at')->limit(3)->get();
        $advertisements = Advertisement::all();
        $prayer = Prayer::latest()->first();
        $breakings = News::where('type', 3)->latest('created_at')->limit(2)->get();
        $poll = Poll::latest()->first();

        return view('frontend.home.home', compact('nationals', 'internationals', 'lifestyles', 'itnews', 'relegiousNews', 'jobs', 'main_lead_newses', 'lead_newses', 'plays', 'entertainments', 'news_boxes', 'poll', 'latest_newses', 'features', 'photos', 'videos', 'opinions', 'successfuls', 'develops', 'prayer', 'breakings', 'advertisements'));
    }

    public function vote($id, Request $request)
    {
        $poll = Poll::findOrFail(intval($id));

        if ($request->has('is_yes')) {
            $poll->increment('is_yes');
        } elseif ($request->has('is_no')) {
            $poll->increment('is_no');
        } else {
            $poll->increment('no_comment');
        }

        return redirect()->back();
    }
}
