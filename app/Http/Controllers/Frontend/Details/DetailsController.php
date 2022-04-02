<?php

namespace App\Http\Controllers\Frontend\Details;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function categoryDetails($id)
    {
        $category = Category::where('id', $id)->first();
        $latestNewses = News::where('category_id', $category->id)->latest()->paginate(15);
        $popularNewses = News::orderBy('view_count', 'DESC')->limit(10)->get();
        return view('frontend.category.category_details', compact('category', 'latestNewses', 'popularNewses'));
    }

    public function newsDetail($id)
    {
        $advertisements = Advertisement::all();
        $news = News::where('id', $id)->first();
        $relatedNewses = News::where('id', '!=', $news->id)->where('category_id', $news->category_id)->latest()->limit(3)->get();
        $latestNewses = News::where('id', '!=', $news->id)->latest()->limit(3)->get();

        return view('frontend.news.news_detail', compact('news', 'relatedNewses', 'latestNewses', 'advertisements'));
    }
}
