<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Multimedia;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lead_newses = News::where('lead_news', 1)->latest()->limit(5)->get();
        $news_boxes = News::where('news_box', 1)->latest()->limit(3)->get();
        $newses = News::all();
        $features = Category::where('feature', 1)->get();
        $photos = Multimedia::orderBy('id', 'DESC')->get();
        $opinions = News::where('type', 1)->latest()->limit(4)->get();

        return view('frontend.home.home', compact('lead_newses', 'news_boxes', 'newses', 'features', 'photos', 'opinions'));
    }




    public function newsDetail($id)
    {
        $news = News::findOrFail(intval($id))->first();
        return view('frontend.news.detail', compact('news'));
    }
}
