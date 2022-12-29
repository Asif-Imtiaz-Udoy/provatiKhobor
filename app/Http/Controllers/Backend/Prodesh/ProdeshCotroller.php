<?php

namespace App\Http\Controllers\Backend\Prodesh;

use App\Http\Controllers\Controller;
use App\Models\Prodesh;
use Illuminate\Http\Request;
use Auth;

class ProdeshCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.prodesh.index')) {
            return redirect()->route('admin.error');
        }
        $prodeshes = Prodesh::orderBy('id', 'DESC')->get();
        return view('backend.prodesh.index', compact('prodeshes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        if (!Auth::user()->can('admin.prodesh.store')) {
            return redirect()->route('admin.error');
        }
        $pordesh = new Prodesh();

        $pordesh->name = $request->name;
        $pordesh->save();
        return redirect()->back()->with('success', 'প্রদেশ সংযুক্ত হয়েছে সফল ভাবে');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        if (!Auth::user()->can('admin.prodesh.edit')) {
            return redirect()->route('admin.error');
        }
        $prodesh = Prodesh::findOrFail(intval($id));
        return view('backend.prodesh.edit', compact('prodesh'));
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
        if (!Auth::user()->can('admin.prodesh.update')) {
            return redirect()->route('admin.error');
        }
        $prodesh = Prodesh::findOrFail(intval($id));

        $prodesh->name = $request->name;
        $prodesh->save();

        return redirect()->route('admin.prodesh.index')->with('success', 'প্রদেশ সফলভাবে আপডেট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.prodesh.destroy')) {
            return redirect()->route('admin.error');
        }
        $prayer = Prodesh::findOrFail(intval($id));
        $prayer->delete();
        return redirect()->route('admin.prodesh.index')->with('success', 'প্রদেশ সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
