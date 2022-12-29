<?php

namespace App\Http\Controllers\Backend\Prayer;

use App\Http\Controllers\Controller;
use App\Models\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;


class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.prayer.index')) {
            return redirect()->route('admin.error');
        }

        $prayers = Prayer::all();
        return view('backend.prayer.prayer', compact('prayers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin.prayer.create')) {
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
        if (!Auth::user()->can('admin.prayer.store')) {
            return redirect()->route('admin.error');
        }
        $validator = Validator::make(
            $request->all(),
            [
                'fozor' => 'required',
                'johor' => 'required',
                'ashor' => 'required',
                'magriv' => 'required',
                'esha' => 'required',
            ]
        );

        Prayer::create($validator->validated());
        return redirect()->route('admin.prayer.index')->with('success', 'নামাজের সময়সূচি সফলভাবে এড করা হয়েছে');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('admin.prayer.show')) {
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
        if (!Auth::user()->can('admin.prayer.edit')) {
            return redirect()->route('admin.error');
        }
        $prayer = Prayer::findOrFail(intval($id));
        return view('backend.prayer.edit', compact('prayer'));
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
        if (!Auth::user()->can('admin.prayer.update')) {
            return redirect()->route('admin.error');
        }
        $prayer = Prayer::findOrFail(intval($id));

        $prayer->update($request->all());

        return redirect()->route('admin.prayer.index')->with('success', 'নামাজের সময়সূচি সফলভাবে আপডেট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (!Auth::user()->can('admin.prayer.destroy')) {
        //     return redirect()->route('admin.error');
        // }
        $prayer = Prayer::findOrFail(intval($id));
        $prayer->delete();
        return redirect()->route('admin.prodesh.index')->with('success', 'নামাজের সময়সূচি সফলভাবে মুছে ফেলা হয়েছে করা হয়েছে');
    }
}
