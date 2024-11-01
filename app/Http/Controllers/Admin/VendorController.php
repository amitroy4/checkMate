<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendor.vendor',compact('vendors'));
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
        //     'vendor_name' => 'required|string|max:255',
        //     'vendor_designation' => 'required|string|max:255',
        //     'company_name' => 'required|string|max:255',
        //     'mobile_number' => 'required|string|max:255',
        //     'whatsapp_number' => 'required|string|max:255',
        //     'email' => 'required|email|unique:vendors,email,',
        // ]);

        Vendor::create($request->all());
        return redirect()->back()->with('success', 'vendor added successfully.');
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
            'vendor_name' => 'required|string|max:255',
            'vendor_designation' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email,',
        ]);

        $vendor = vendor::findOrFail($id);
        $vendor->vendor_name = $request->vendor_name;
        $vendor->vendor_designation = $request->vendor_designation;
        $vendor->company_name = $request->company_name;
        $vendor->mobile_number = $request->mobile_number;
        $vendor->whatsapp_number = $request->whatsapp_number;
        $vendor->email = $request->email;
        $vendor->status = $request->status;
        $vendor->save();

        return response()->json(['success' => 'vendor updated successfully!'], 200);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vendor::destroy($id);
        return redirect()->back()->with('success', 'vendor deleted successfully.');
    }

    public function status($id)
    {

        $client = Vendor::findOrFail($id);
        $client->status = $client->status === 1 ? 0 : 1 ;
        $client->save();

        return redirect()->back()->with('success','Vendor Status updated successfully!');
    }
}
