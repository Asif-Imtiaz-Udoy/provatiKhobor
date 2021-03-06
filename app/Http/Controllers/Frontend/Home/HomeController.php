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
        $lead_newses = News::where('lead_news', 1)->latest('created_at')->limit(5)->get();
        $latest_newses = News::latest('created_at')->limit(5)->get();
        $news_boxes = News::where('news_box', 1)->latest()->limit(3)->get();
        $features = Category::where('feature', 1)->get();
        $photos = Multimedia::orderBy('id', 'DESC')->where('category', 1)->limit(10)->get();
        $videos = Multimedia::orderBy('id', 'DESC')->where('category', 2)->limit(4)->get();
        $opinions = News::where('type', 1)->latest('created_at')->limit(4)->get();
        $successfuls = News::where('type', 2)->latest('created_at')->limit(3)->get();
        $develops = News::where('type', 4)->latest('created_at')->limit(3)->get();
        $advertisements = Advertisement::all();
        $prayer = Prayer::latest()->first();
        $breakings = News::where('type', 3)->latest('created_at')->limit(2)->get();
        $poll = Poll::latest()->first();

        return view('frontend.home.home', compact('lead_newses', 'news_boxes', 'poll', 'latest_newses', 'features', 'photos', 'videos', 'opinions', 'successfuls', 'develops', 'prayer', 'breakings', 'advertisements'));
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
