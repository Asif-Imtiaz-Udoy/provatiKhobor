<?php

namespace App\Http\Controllers\Backend\Multimedia;

use App\Http\Controllers\Controller;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Auth;


class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.multimedia.index')) {
            return redirect()->route('admin.error');
        }

        $multimedias = Multimedia::orderBy('id', 'DESC')->get();
        return view('backend.multimedia.multimedia', compact('multimedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin.multimedia.create')) {
            return redirect()->route('admin.error');
        }

        return view('backend.multimedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin.multimedia.store')) {
            return redirect()->route('admin.error');
        }

        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'caption' => 'required',
                'category' => 'required',
            ]
        );


        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1200, 625)->save('images/multimedia/' . $thumbnail);
        } else {
            $thumbnail = '';
        }

        $url = $request->video_link;
        
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                $url = 'http://www.youtube.com/embed/'. $match[1];
            }
        }

        Multimedia::create(
            array_merge(
                [
                    "photo" => $thumbnail,
                    "video_link" => $url,
                ],
                $validator->validated()
            )
        );
        return redirect()->route('admin.multimedia.index')->with('success', 'ছবি/ভিডিওটি সঠিকভাবে সংযুক্ত করা হয়েছে');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('admin.multimedia.show')) {
            return redirect()->route('admin.error');
        }

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('admin.multimedia.edit')) {
            return redirect()->route('admin.error');
        }

        $multimedia = Multimedia::findOrFail(intval($id));
        return view('backend.multimedia.edit', compact('multimedia'));
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
        if (!Auth::user()->can('admin.multimedia.update')) {
            return redirect()->route('admin.error');
        }


        $multimedia = Multimedia::findOrFail(intval($id));
        // dd($request->all());
        $this->validate($request, array(
            'category' => 'required',
            'caption' => 'required',
        ));

        $multimedia->category = $request->category;
        $multimedia->caption = $request->caption;
        $multimedia->video_link = $request->video_link;

        if ($request->hasfile('photo')) {
            $img_path = 'images/multimedia/' . $multimedia->photo;
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            //image upload
            $image = $request->file('photo');
            $ad_image = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1200, 625)->save('images/multimedia/' . $ad_image);

            $multimedia->photo = $ad_image;
        } else {
            $multimedia->photo = $multimedia->photo;
        }

        $multimedia->update();
        return redirect()->route('admin.multimedia.index')->with('success', 'ছবি/ভিডিওটি সঠিকভাবে আপডেট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.multimedia.destroy')) {
            return redirect()->route('admin.error');
        }

        $multimedia = Multimedia::findOrFail(intval($id));

        if ($multimedia->category == 1) {

            if (file_exists('images/multimedia/' . $multimedia->photo)) {
                unlink('images/multimedia/' . $multimedia->photo);
            }
            $multimedia->delete();
        } elseif ($multimedia->category == 2) {
            $multimedia->delete();
        }
        return redirect()->route('admin.multimedia.index')->with('success', 'ছবিটি সফলভাবে মুছে ফেলা হয়েছে');
    }
}
