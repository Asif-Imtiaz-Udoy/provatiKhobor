<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.user.index')) {
            return redirect()->route('admin.error');
        }

        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin.user.create')) {
            return redirect()->route('admin.error');
        }
        $roles = Role::all();
        return view('backend.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin.user.store')) {
            return redirect()->route('admin.error');
        }

        $validate = $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required'
        ));
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        return redirect()->route('admin.user.index')->with('success', 'এডমিনটি সফলভাবে এড করা হয়েছে');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('admin.user.show')) {
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
        if (!Auth::user()->can('admin.user.edit')) {
            return redirect()->route('admin.error');
        }
        $user = User::findOrFail(intval($id));
        $roles = Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
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
        if (!Auth::user()->can('admin.user.update')) {
            return redirect()->route('admin.error');
        }
        $user = User::findOrFail(intval($id));

        $validate = $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required'
        ));

        $user = User::findOrFail(intval($id));
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        return redirect()->route('admin.user.index')->with('success', 'এডমিনটি সফলভাবে এডিট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.user.destroy')) {
            return redirect()->route('admin.error');
        }
        $user = User::findOrFail(intval($id));
        if ($user->id == 1) {
            return back()->with('warning', 'এই এডমিন কে মুছে ফেলার জন্য আপনার কোন অনুমতি নেই');
        } elseif ($user->id == 2) {
            return back()->with('warning', 'এই এডমিন কে মুছে ফেলার জন্য আপনার কোন অনুমতি নেই');
        }
        $user->delete();
        return back()->with('success', 'এই এডমিন কে সফলভাবে মুছে ফেলা হয়েছে');
    }
}
