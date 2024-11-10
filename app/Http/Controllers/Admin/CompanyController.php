<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.company', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.addcompany');
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

        // Handle file upload if there is a logo
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = $logoPath;
        }

        // Create the company
        Company::create($validatedData);

        // Redirect with success message
        return redirect()->route('company.index')->with('success', 'Company added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.editcompany', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);

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

        // Handle file upload if a new logo is provided
        if ($request->hasFile('company_logo')) {
            // Delete the old logo if it exists
            if ($company->company_logo && Storage::disk('public')->exists($company->company_logo)) {
                Storage::disk('public')->delete($company->company_logo);
            }

            // Store the new logo
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = $logoPath;
        }

        // Update the company data
        $company->update($validatedData);

        // Redirect with success message
        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company_logo = $company->company_logo;
        try {

            $company->delete();
            // Delete the logo if it exists
            if ($company_logo && Storage::disk('public')->exists($company_logo)) {
                Storage::disk('public')->delete($company_logo);
            }

            return redirect()->route('company.index')->with('success', 'Company deleted successfully.');

        } catch (Exception) {
            return redirect()->back()->with('danger', 'This Company cannot be deleted.');
        }
    }
    public function status($id)
    {

        $client = Company::findOrFail($id);
        $client->status = $client->status === 1 ? 0 : 1 ;
        $client->save();

        return redirect()->back()->with('success','Company Status updated successfully!');
    }
}
