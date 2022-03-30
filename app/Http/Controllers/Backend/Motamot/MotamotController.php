<?php

namespace App\Http\Controllers\Backend\Motamot;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Auth;

class MotamotController extends Controller
{
    public function index()
    {
        if (!Auth::user()->can('admin.motamot')) {
            return redirect()->route('admin.error');
        }
        $newses = News::orderBy('id', 'DESC')->get();

        return view('backend.motamot.motamot', compact('newses'));
    }

    public function create()
    {
        if (!Auth::user()->can('admin.motamot.create')) {
            return redirect()->route('admin.error');
        }
        return view('backend.motamot.create');
    }

    public function edit($id)
    {
        if (!Auth::user()->can('admin.motamot.edit')) {
            return redirect()->route('admin.error');
        }
        $news = News::findOrFail(intval($id));
        return view('backend.motamot.edit', compact('news'));
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('admin.motamot.destroy')) {
            return redirect()->route('admin.error');
        }
        $news = News::findOrFail(intval($id));

        if (file_exists('images/news/' . $news->news_image)) {
            unlink('images/news/' . $news->news_image);
        }

        $news->delete();

        return redirect()->route('admin.motamot')->with('success', 'সংবাদটি সফলভাবে মুছে ফেলা হয়েছে');
    }
}
