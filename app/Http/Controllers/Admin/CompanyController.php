<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.company',compact('companies'));
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
        // Validate the request data
        $validatedData = $request->validate([
            'company_name' => 'required|string',
            'company_address' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
            'land_line_number' => 'nullable|string',
            'email' => 'required|email',
            'company_website' => 'nullable|url',
            'company_facebook_url' => 'nullable|url',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Image validation
            'registration_number' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Debugging the validated data if needed
        // dd($validatedData);

        // Handle file upload if there is a logo
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = $logoPath;
        }

        // Create the company
        $company = Company::create($validatedData);

        // Redirect with success message
        return redirect()->route('company.index')
                        ->with('success', 'Company added successfully.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }
}
