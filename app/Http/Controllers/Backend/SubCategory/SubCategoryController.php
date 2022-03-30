<?php

namespace App\Http\Controllers\Backend\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class SubCategoryController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin.subCategory.store')) {
            return redirect()->route('admin.error');
        }

        $validator = Validator::make(
            $request->all(),
            [
                'category_id' => 'required',
                'sub_name' => 'required'
            ]
        );

        SubCategory::create(

            $validator->validated()
        );

        return redirect()->route('admin.category.index')->with('success', 'সাব-ক্যাটগরি সফলভাবে আপলোড হয়েছে');
    }

    public function edit($id)
    {
        if (!Auth::user()->can('admin.subCategory.edit')) {
            return redirect()->route('admin.error');
        }

        $sub_cat = SubCategory::findOrFail(intval($id));
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.sub_category.edit', compact('sub_cat', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('admin.subCategory.update')) {
            return redirect()->route('admin.error');
        }
        $sub_cat = SubCategory::findOrFail(intval($id));
        
        $validator = Validator::make(
            $request->all(),
            [
                'category_id' => 'required',
                'sub_name' => 'required'
            ]
        );

        $sub_cat->update(

            $validator->validated()
        );
        return redirect()->route('admin.category.index')->with('success', 'সাব-ক্যাটগরি সফলভাবে আপডেট করা হয়েছে');
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('admin.subCategory.destroy')) {
            return redirect()->route('admin.error');
        }

        $sub_cat = SubCategory::findOrFail(intval($id));
        $sub_cat->delete();
        
        return redirect()->route('admin.category.index')->with('success', 'ক্যাটাগরিটি সফল ভাবে সংযুক্ত করা হয়েছে');
    }
}
