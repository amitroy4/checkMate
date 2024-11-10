<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Exception;
use Illuminate\Http\Request;

class BankController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::all();
        return view('admin.bank.bank',compact('banks'));
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
        // $request->validate([
        //     'bank_name' => 'required|string|max:255',
        //     'branch_name' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        // ]);

        Bank::create($request->all());
        return redirect()->back()->with('success', 'bank added successfully.');
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
            'bank_name' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $bank = Bank::findOrFail($id);
        $bank->bank_name = $request->bank_name;
        $bank->branch_name = $request->branch_name;
        $bank->address = $request->address;
        $bank->save();

        return response()->json(['success' => 'bank updated successfully!'], 200);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Bank::destroy($id);
            return redirect()->back()->with('success', 'bank deleted successfully.');
        } catch (Exception) {
            // Handle the case where the Bank cannot be deleted due to foreign key constraint
            return redirect()->back()->with('danger','This Bank cannot be deleted.');
        }
    }
}
