<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Vendor;
use App\Models\ChequePay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChequePaymentRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::all();
        $banks = Bank::all();
        $chequepays = ChequePay::all();
        return view('admin.chequeregister.chequepayment-register', compact('chequepays','vendors','banks'));
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
}
