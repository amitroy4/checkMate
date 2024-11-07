<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = UserRole::all();
        return view('admin.manageuser.role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'role_name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        UserRole::create($data);
        return redirect()->back()->with('success', 'Role added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $role = UserRole::findOrFail($id);
        $role->role_name = $request->role_name;
        $role->save();

        session()->flash('success', 'Role updated successfully!');

        return response()->json(['success' => 'Role updated successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserRole::destroy($id);
        return redirect()->back()->with('success', 'Role deleted successfully.');
    }
}
