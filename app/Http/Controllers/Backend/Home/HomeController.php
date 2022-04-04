<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.home.home');
    }

    public function uploadImage(Request $request)
    {
        $imgpath = $request->file('file')->store('post', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
