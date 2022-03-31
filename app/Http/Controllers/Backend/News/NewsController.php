<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
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
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.news.create', compact('categories'));
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
                'thumbnail' => 'required',
                'reporter' => 'string',
                'news_body' => 'required',
                'category_id' => 'required',
            ]
        );

        if (News::where('slug', $request->title)->exists()) {
            $slug = str_replace(' ', '-', $request->title) . rand(0, 99);
        } else {
            $slug = str_replace(' ', '-', $request->title);
        }

        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1200, 625)->save('images/news/' . $thumbnail);
        } else {
            $validator->validated();
        }

        News::create(
            array_merge(
                [
                    "news_image" => $thumbnail,
                    'slug' => $slug,
                    'sub_title' => $request->sub_title,
                    'image_caption' => $request->image_caption,
                    'lead_news' => $request->lead_news,
                    'news_box' => $request->news_box,
                    'type' => $request->type,
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
        } elseif ($news->type == 4) {
            return redirect()->route('admin.development')->with('success', 'সংবাদটি সফলভাবে আপলোড হয়েছে');
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
        $categories = Category::orderBy('id', 'DESC')->get();
        $news = News::findOrFail(intval($id));
        return view('backend.news.edit', compact('news', 'categories'));
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
                'thumbnail' => 'required',
                'reporter' => 'required',
                'news_body' => 'required',
                'category_id' => 'required',
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

        if ($news->slug == $request->title) {

            $news->update(
                array_merge(
                    [
                        "news_image" => $thumbnail,
                        'sub_category' => $request->sub_category,
                        'slug' => $news->slug,
                        'sub_title' => $request->sub_title,
                        'image_caption' => $request->image_caption,
                        'lead_news' => $request->lead_news,
                        'news_box' => $request->news_box,
                        'type' => $request->type,
                        'tag' => $request->tag,
                    ],
                    $validator->validated()
                )
            );
        } else {
            if (News::where('slug', $request->title)->exists()) {
                $slug = str_replace(' ', '-', $request->title) . rand(0, 99);
            } else {
                $slug = str_replace(' ', '-', $request->title);
            }
            $news->update(
                array_merge(
                    [
                        "news_image" => $thumbnail,
                        'slug' => $slug,
                        'sub_category' => $request->sub_category,
                        'sub_title' => $request->sub_title,
                        'image_caption' => $request->image_caption,
                        'lead_news' => $request->lead_news,
                        'news_box' => $request->news_box,
                        'type' => $request->type,
                        'tag' => $request->tag,
                    ],
                    $validator->validated()
                )
            );
        }

        if ($news->type == 0) {
            return redirect()->route('admin.news.index')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        } elseif ($news->type == 1) {
            return redirect()->route('admin.motamot')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        } elseif ($news->type == 2) {
            return redirect()->route('admin.sofolPerson')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        } elseif ($news->type == 3) {
            return redirect()->route('admin.khashKhobor')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
        }elseif ($news->type == 4) {
            return redirect()->route('admin.development')->with('success', 'সংবাদটি সফলভাবে আপডেট করা হয়েছে');
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
