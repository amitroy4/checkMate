<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $userroles = UserRole::all();
        return view('admin.manageuser.manageuser',compact('users','userroles'));
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
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',  // Validate user_id (snake case)
            'phone' => 'required|string|max:255',
            'email' => 'required|email',
            'status' => 'required',
            'password' => 'required',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'userId' => $request->user_id,  // Correctly map 'user_id' to the database field
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => $request->status,
            'role_id' => $request->role,

            'password' => Hash::make($request->password),  // Hash the password
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'User added successfully.');
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

        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email',
            'status' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->userId = $request->user_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->role_id = $request->role;
        if($user->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        session()->flash('success', 'user updated successfully!');

        return response()->json(['success' => 'user updated successfully!'], 200);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // User::destroy($id);
        // return redirect()->back()->with('success', 'user deleted successfully.');
    }


    public function status($id)
    {

        $user = User::findOrFail($id);
        $user->status = $user->status === 1 ? 0 : 1 ;
        $user->save();

        return redirect()->back()->with('success','user Status updated successfully!');
    }
}
