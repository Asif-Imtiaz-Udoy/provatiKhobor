<?php

namespace App\Http\Controllers\Backend\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.advertisement.index')) {
            return redirect()->route('admin.error');
        }
        $advertisements = Advertisement::orderBy('id', 'DESC')->get();
        return view('backend.advertisement.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin.advertisement.create')) {
            return redirect()->route('admin.error');
        }
        return view('backend.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin.advertisement.store')) {
            return redirect()->route('admin.error');
        }
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'ad_category' => 'required',
                'add_type' => 'required',
                'vendor' => 'required',
            ]
        );


        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('images/advertisement/' . $thumbnail);
        } else {
            $thumbnail = '';
        }

        Advertisement::create(
            array_merge(
                [
                    "add_image" => $thumbnail,
                    "link" => $request->link,
                    "add_script" => $request->add_script
                ],
                $validator->validated()
            )
        );
        return redirect()->route('admin.advertisement.index')->with('success', 'বিজ্ঞাপনটি সঠিকভাবে সংযুক্ত করা হয়েছে');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('admin.advertisement.show')) {
            return redirect()->route('admin.error');
        }
        $advertisement = Advertisement::findOrFail(intval($id));
        return view('backend.advertisement.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('admin.advertisement.edit')) {
            return redirect()->route('admin.error');
        }
        $advertisement = Advertisement::findOrFail(intval($id));
        return view('backend.advertisement.edit', compact('advertisement'));
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
        if (!Auth::user()->can('admin.advertisement.update')) {
            return redirect()->route('admin.error');
        }
        $advertisement = Advertisement::findOrFail(intval($id));

        $validator = Validator::make(
            $request->all(),
            [
                'ad_category' => 'required',
                'add_type' => 'required',
                'vendor' => 'required',
            ]
        );

        if ($request->hasfile('thumbnail')) {
            $img_path = 'images/advertisement/' . $advertisement->add_image;
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            //image upload
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('images/advertisement/' . $thumbnail);
        } else {
            $thumbnail = $advertisement->add_image;
        }

        $advertisement->update(
            array_merge(
                [
                    "add_image" => $thumbnail,
                    "link" => $request->link,
                    "add_script" => $request->add_script
                ],
                $validator->validated()
            )
        );
        return redirect()->route('admin.advertisement.index')->with('success', 'বিজ্ঞাপনটি সঠিকভাবে আপডেট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.advertisement.destroy')) {
            return redirect()->route('admin.error');
        }
        $advertisement = Advertisement::findOrFail(intval($id));

        if ($advertisement->add_type == 1) {
            if (file_exists('images/advertisement/' . $advertisement->add_image)) {
                unlink('images/advertisement/' . $advertisement->add_image);
            }

            $advertisement->delete();

            return redirect()->route('admin.advertisement.index')->with('success', 'বিজ্ঞাপনটি সঠিকভাবে মুছে ফেলা হয়েছে');
        } elseif ($advertisement->add_type == 2) {

            $advertisement->delete();

            return redirect()->route('admin.advertisement.index')->with('success', 'বিজ্ঞাপনটি সঠিকভাবে মুছে ফেলা হয়েছে');
        }
    }
}
