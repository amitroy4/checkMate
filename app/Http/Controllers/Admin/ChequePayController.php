<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ChequePayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.chequepay.cheque-pay');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $vendors = Vendor::all();
        $banks = Bank::all();
        return view('admin.chequepay.addcheque-pay',compact('companies','vendors','banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

    public function vendorStore(Request $request)
    {
        Vendor::create($request->all());
        return redirect()->back()->with('success', 'vendor added successfully.');
    }

    public function bankStore(Request $request)
    {
        Bank::create($request->all());
        return redirect()->back()->with('success', 'bank added successfully.');
    }


}
