<?php

namespace App\Http\Controllers\Backend\SofolPerson;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Auth;

class SofolPersonController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        if (!Auth::user()->can('admin.sofolPerson')) {
            return redirect()->route('admin.error');
        }

        $newses = News::orderBy('id', 'DESC')->get();
        return view('backend.sofolPerson.sofolPerson', compact('newses'));
    }

    public function create()
    {
        if (!Auth::user()->can('admin.sofolPerson.create')) {
            return redirect()->route('admin.error');
        }

        return view('backend.sofolPerson.create');
    }

    public function edit($id)
    {
        if (!Auth::user()->can('admin.sofolPerson.edit')) {
            return redirect()->route('admin.error');
        }
        $news = News::findOrFail(intval($id));
        return view('backend.sofolPerson.edit', compact('news'));
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('admin.sofolPerson.destroy')) {
            return redirect()->route('admin.error');
        }

        $news = News::findOrFail(intval($id));

        if (file_exists('images/news/' . $news->news_image)) {
            unlink('images/news/' . $news->news_image);
        }

        $news->delete();

        return redirect()->route('admin.sofolPerson')->with('success', 'সংবাদটি সফলভাবে মুছে ফেলা হয়েছে');
    }
}
