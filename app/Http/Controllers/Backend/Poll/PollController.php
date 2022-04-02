<?php

namespace App\Http\Controllers\Backend\Poll;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;
use Auth;


class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.poll.index')) {
            return redirect()->route('admin.error');
        }

        $polls = Poll::orderBy('id', 'DESC')->get();
        return view('backend.poll.index', compact('polls'));
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
        if (!Auth::user()->can('admin.poll.store')) {
            return redirect()->route('admin.error');
        }

        $poll = new Poll();
        $poll->question = $request->question;
        $poll->save();
        return back()->with('success', 'ভোটের টাইটেল সফলভাবে সংযুক্ত করা হয়েছে');
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
        if (!Auth::user()->can('admin.poll.edit')) {
            return redirect()->route('admin.error');
        }
        $poll = Poll::findOrFail(intval($id));
        return view('backend.poll.edit', compact('poll'));
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

        if (!Auth::user()->can('admin.poll.update')) {
            return redirect()->route('admin.error');
        }

        $poll = Poll::findOrFail(intval($id));

        $poll->question = $request->question;
        $poll->save();

        return redirect()->route('admin.poll.index')->with('success', 'ভোটের টাইটেল সফলভাবে আপডেট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.poll.destroy')) {
            return redirect()->route('admin.error');
        }

        $poll = Poll::findOrFail(intval($id));
        $poll->delete();
        return back()->with('success', 'ভোটের টাইটেল কে সঠিক ভাবে মুছে ফেলা হয়েছে');
    }
}
