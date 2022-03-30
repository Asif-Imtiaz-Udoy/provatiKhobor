<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.news.index')) {
            return redirect()->route('admin.error');
        }

        $categories = Category::orderBy('id', 'DESC')->get();
        $newses = News::orderBy('id', 'DESC')->get();
        return view('backend.news.news', compact('newses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin.news.create')) {
            return redirect()->route('admin.error');
        }
        $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.news.create', compact('categories', 'sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin.news.store')) {
            return redirect()->route('admin.error');
        }

        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'sub_title' => 'required',
                'thumbnail' => 'required',
                'image_caption' => 'required',
                'news_body' => 'required',
                'lead_news' => 'numeric',
                'news_box' => 'numeric',
                'reporter' => 'string',
                'type' => 'numeric',
                'tag' => 'string'
            ]
        );

        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(185, 248)->save('images/news/' . $thumbnail);
        } else {
            $validator->validated();
        }

        News::create(
            array_merge(
                [
                    "news_image" => $thumbnail,
                    'sub_category' => $request->sub_category,
                    'category_id' => $request->category_id,
                ],
                $validator->validated()
            )
        );

        $news = News::orderBy('updated_at', 'DESC')->first();

        if ($news->type == 0) {
            return redirect()->route('admin.news.index')->with('success', 'সংবাদটি সফলভাবে আপলোড হয়েছে');
        } elseif ($news->type == 1) {
            return redirect()->route('admin.motamot')->with('success', 'সংবাদটি সফলভাবে আপলোড হয়েছে');
        } elseif ($news->type == 2) {
            return redirect()->route('admin.sofolPerson')->with('success', 'সংবাদটি সফলভাবে আপলোড হয়েছে');
        } elseif ($news->type == 3) {
            return redirect()->route('admin.khashKhobor')->with('success', 'সংবাদটি সফলভাবে আপলোড হয়েছে');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('admin.news.show')) {
            return redirect()->route('admin.error');
        }
        $news = News::findOrFail(intval($id));
        return view('backend.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('admin.news.edit')) {
            return redirect()->route('admin.error');
        }
        $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        $news = News::findOrFail(intval($id));
        return view('backend.news.edit', compact('news', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('admin.news.update')) {
            return redirect()->route('admin.error');
        }

        $news = News::findOrFail(intval($id));

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'sub_title' => 'required',
                'thumbnail' => 'required',
                'image_caption' => 'required',
                'news_body' => 'required',
                'lead_news' => 'numeric',
                'news_box' => 'numeric',
                'reporter' => 'string',
                'type' => 'numeric',
            ]
        );

        if ($request->hasfile('thumbnail')) {
            $img_path = 'images/news/' . $news->news_image;
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            //image upload

            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1200, 625)->save('images/news/' . $thumbnail);
        } else {
            $thumbnail = $news->news_image;
        }

        $news->update(
            array_merge(
                [
                    "news_image" => $thumbnail,
                    'sub_category' => $request->sub_category,
                    'category_id' => $request->category_id,
                ],
                $validator->validated()
            )
        );
        if ($news->type == 0) {
            return redirect()->route('admin.news.index')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        } elseif ($news->type == 1) {
            return redirect()->route('admin.motamot')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        } elseif ($news->type == 2) {
            return redirect()->route('admin.sofolPerson')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        } elseif ($news->type == 3) {
            return redirect()->route('admin.khashKhobor')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.news.destroy')) {
            return redirect()->route('admin.error');
        }
        $news = News::findOrFail(intval($id));

        if (file_exists('images/news/' . $news->news_image)) {
            unlink('images/news/' . $news->news_image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'সংবাদটি সফলভাবে মুছে ফেলা হয়েছে');
    }
}
