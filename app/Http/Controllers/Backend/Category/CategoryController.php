<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.category.index')) {
            return redirect()->route('admin.error');
        }

        $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.category.index', compact('categories', 'sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin.category.create')) {
            return redirect()->route('admin.error');
        }
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin.category.store')) {
            return redirect()->route('admin.error');
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',

            ]
        );

        Category::create(

            array_merge(
                [
                    "feature" => $request->feature,
                    'order_id' => $request->order_id,
                ],

                $validator->validated()
            )
        );

        return redirect()->route('admin.category.index')->with('success', 'ক্যাটগরি সফলভাবে আপলোড হয়েছে');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('admin.category.show')) {
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
        if (!Auth::user()->can('admin.category.edit')) {
            return redirect()->route('admin.error');
        }

        $category = Category::findOrFail(intval($id));
        return view('backend.category.edit', compact('category'));
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
        if (!Auth::user()->can('admin.category.update')) {
            return redirect()->route('admin.error');
        }
        $category = Category::findOrFail(intval($id));


        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );

        $category->update(

            array_merge(
                [
                    "feature" => $request->feature,
                    'order_id' => $request->order_id,
                ],

                $validator->validated()
            )
        );

        return redirect()->route('admin.category.index')->with('success', 'ক্যাটগরি সফলভাবে আপডেট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.category.destroy')) {
            return redirect()->route('admin.error');
        }

        $category = Category::findOrFail(intval($id));
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'ক্যাটাগরিটি সফল ভাবে মুছে ফেলা হয়েছে');
    }
}
