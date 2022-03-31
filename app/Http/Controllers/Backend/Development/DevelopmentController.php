<?php

namespace App\Http\Controllers\Backend\Development;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Auth;

class DevelopmentController extends Controller
{
    public function index()
    {

        if (!Auth::user()->can('admin.development')) {
            return redirect()->route('admin.error');
        }

        $newses = News::orderBy('id', 'DESC')->get();

        return view('backend.development.development', compact('newses'));
    }

    public function create()
    {
        if (!Auth::user()->can('admin.development.create')) {
            return redirect()->route('admin.error');
        }
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.development.create', compact('categories'));
    }

    public function edit($id)
    {
        if (!Auth::user()->can('admin.development.edit')) {
            return redirect()->route('admin.error');
        }
        $categories = Category::orderBy('id', 'DESC')->get();
        $news = News::findOrFail(intval($id));
        return view('backend.development.edit', compact('news', 'categories'));
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('admin.development.destroy')) {
            return redirect()->route('admin.error');
        }

        $news = News::findOrFail(intval($id));

        if (file_exists('images/news/' . $news->news_image)) {
            unlink('images/news/' . $news->news_image);
        }

        $news->delete();

        return redirect()->route('admin.development.development')->with('success', 'সংবাদটি সফলভাবে মুছে ফেলা হয়েছে');
    }
}
