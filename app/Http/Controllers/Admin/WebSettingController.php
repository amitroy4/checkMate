<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use WeakMap;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websetting = WebSetting::first(); // Fetch the first record if it exists, otherwise null
        if (!$websetting) {
            $websetting = new WebSetting(); // Pass an empty instance if no record exists
        }

        return view('admin.websetting.web-setting', compact('websetting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //     $websetting = new WebSetting();
    //    return view('admin.websetting.web-setting', compact('websetting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

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
    public function edit( $id)
    {
        $websetting = WebSetting::findOrFail($id);

        // Pass the specific WebSetting to the view
        return view('admin.websetting.web-setting', compact('websetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebSetting $websetting)
    {

        $validateData = $request->validate([
            'company_name' => 'required|string',
            'company_address' => 'required|string',
            'contact' => 'nullable|string',
            'website' => 'nullable|string',
            'email' => 'nullable|string',
            'landphone' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg',
            'favicon' => 'nullable|image',
            'systemLogo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('logo')) {
            // Ensure the file is valid
            if ($request->file('logo')->isValid()) {
                // Store the image in the 'uploads/companyLogo' folder under the 'public' disk
                $validateData['logo'] = $request->file('logo')->store('uploads/companyLogo', 'public');
            }
        }

        if ($request->hasFile('favicon')) {
            // Ensure the file is valid
            if ($request->file('favicon')->isValid()) {
                // Store the image in the 'uploads/companyfavicon' folder under the 'public' disk
                $validateData['favicon'] = $request->file('favicon')->store('uploads/companyLogo', 'public');
            }
        }

        if ($request->hasFile('systemLogo')) {
            // Ensure the file is valid
            if ($request->file('systemLogo')->isValid()) {
                // Store the image in the 'uploads/companysystemLogo' folder under the 'public' disk
                $validateData['systemLogo'] = $request->file('systemLogo')->store('uploads/companyLogo', 'public');
            }
        }

        $websetting->update($validateData);
        return redirect()->back()->with('success', 'Information added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        // $websetting->delete();
        // Storage::disk('public')->delete($websetting->logo);

        // return redirect()->route('websetting.index')
        // ->with('success', 'Deleted successfully.');

    }
}
