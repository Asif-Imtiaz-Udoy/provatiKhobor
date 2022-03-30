<?php

namespace App\Http\Controllers\Backend\Error;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index()
    {
        return view('backend.error.index');
    }
}
