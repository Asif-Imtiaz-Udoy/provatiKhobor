<?php

namespace App\Http\Controllers\Backend\KhasKhobor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Auth;


class KhashKhoborController extends Controller
{
    public function index()
    {

        if (!Auth::user()->can('admin.khashKhobor')) {
            return redirect()->route('admin.error');
        }

        $newses = News::orderBy('id', 'DESC')->get();

        return view('backend.khash.index', compact('newses'));
    }

    public function create()
    {
        if (!Auth::user()->can('admin.khashKhobor.create')) {
            return redirect()->route('admin.error');
        }
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.khash.create', compact('categories'));
    }

    public function edit($id)
    {
        if (!Auth::user()->can('admin.khashKhobor.edit')) {
            return redirect()->route('admin.error');
        }
        $categories = Category::orderBy('id', 'DESC')->get();
        $news = News::findOrFail(intval($id));
        return view('backend.khash.edit', compact('news', 'categories'));
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('admin.khashKhobor.destroy')) {
            return redirect()->route('admin.error');
        }

        $news = News::findOrFail(intval($id));

        if (file_exists('images/news/' . $news->news_image)) {
            unlink('images/news/' . $news->news_image);
        }

        $news->delete();

        return redirect()->route('admin.khashKhobor')->with('success', 'সংবাদটি সফলভাবে মুছে ফেলা হয়েছে');
    }
}
