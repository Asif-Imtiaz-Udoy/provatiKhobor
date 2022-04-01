<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Multimedia;
use App\Models\News;
use App\Models\Prayer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lead_newses = News::where('lead_news', 1)->latest('created_at')->limit(5)->get();
        $latest_newses = News::latest('created_at')->limit(5)->get();
        $news_boxes = News::where('news_box', 1)->latest()->limit(3)->get();
        $features = Category::where('feature', 1)->get();
        $photos = Multimedia::orderBy('id', 'DESC')->where('category', 1)->limit(10)->get();
        $videos = Multimedia::orderBy('id', 'DESC')->where('category', 2)->limit(4)->get();
        $opinions = News::where('type', 1)->latest('created_at')->limit(4)->get();
        $successfuls = News::where('type', 2)->latest('created_at')->limit(3)->get();
        $develops = News::where('type', 4)->latest('created_at')->limit(3)->get();
        $breakings = News::where('type', 3)->latest('created_at')->limit(3)->get();
        $prayer = Prayer::latest()->first();

        return view('frontend.home.home', compact('lead_newses', 'news_boxes', 'latest_newses', 'features', 'photos', 'videos', 'opinions', 'successfuls', 'develops', 'prayer', 'breakings'));
    }




    public function newsDetail($id)
    {
        $news = News::findOrFail(intval($id))->first();
        return view('frontend.news.detail', compact('news'));
    }
}
