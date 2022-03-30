<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admin.role.index')) {
            return redirect()->route('admin.error');
        }

        $roles = Role::all();
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admin.role.create')) {
            return redirect()->route('admin.error');
        }

        $permissions = Permission::all();
        return view('backend.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admin.role.store')) {
            return redirect()->route('admin.error');
        }

        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = "web";

        $role->save();
        $permissions =  $request->permissions;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('admin.role.index')->with('success', 'একটি রোল পারমিশন সফলভাবে তৈরী করা হয়েছে');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('admin.role.show')) {
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
        if (!Auth::user()->can('admin.role.edit')) {
            return redirect()->route('admin.error');
        }
        $role = Role::findOrFail(intval($id));
        $permissions = Permission::all();
        return view('backend.role.edit', compact('role', 'permissions'));
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
        if (!Auth::user()->can('admin.role.update')) {
            return redirect()->route('admin.error');
        }
        $role = Role::findOrFail(intval($id));
        $role->name = $request->name;

        $role->save();

        $permissions =  $request->permissions;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('admin.role.index')->with('success', 'একটি রোল পারমিশন সফলভাবে এডিট করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admin.role.destroy')) {
            return redirect()->route('admin.error');
        }
        $role = Role::findOrFail(intval($id));
        if ($role->id == 1) {
            return back()->with('warning', 'দুঃখিত সুপার এডমিনকে কোনভাবে মুছে ফেলা সম্ভব নয়');
        }
        $role->delete();
        return back()->with('success', 'এই রোল কে সফলভাবে মুছে ফেলা হয়েছে');
    }
}
