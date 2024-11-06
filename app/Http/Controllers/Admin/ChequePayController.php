<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Vendor;
use App\Models\Company;
use App\Models\ChequePay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChequePayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $vendors = Vendor::all();
        $banks = Bank::all();
        $chequepays = ChequePay::all();
        return view('admin.chequepay.cheque-pay',compact('chequepays','companies','vendors','banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('status', 1)->get();
        $vendors = Vendor::where('status', 1)->get();
        $banks = Bank::all();
        return view('admin.chequepay.addcheque-pay',compact('companies','vendors','banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|integer|exists:companies,id',
            'cheque_date' => 'required|date',
            'payee_id' => 'required|integer|exists:vendors,id',
            'bank_id' => 'required|integer|exists:banks,id',
            'amount' => 'required|numeric|min:0',
            'paytype' => 'required|string|max:255',
            'cheque_number' => 'required|string|max:50',
            'is_fly_cheque' => 'required|boolean',
            'cheque_status' => 'nullable|string',
            'cheque_clearing_date' => 'nullable|date',
            'cheque_reason' => 'nullable|string',
        ]);
        
        if ($request->is_fly_cheque == 1) {
            $validatedData['cheque_status'] = 'Approved';
        }

        $chequePayee = ChequePay::create($validatedData);

        if ($request->is_fly_cheque == 1) {
            return redirect()->route('pdf.chequepayee', ['payeeId' => $chequePayee->id]);
        }

        return redirect()->route('chequepay.index')->with('success', 'Cheque Pay record created successfully!');
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
        $chequePay = ChequePay::findOrFail($id);
        $companies = Company::all();
        $vendors = Vendor::all();
        $banks = Bank::all();
        return view('admin.chequepay.editcheque-pay', compact('chequePay', 'companies', 'vendors', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|integer|exists:companies,id',
            'cheque_date' => 'required|date',
            'payee_id' => 'required|integer|exists:vendors,id',
            'bank_id' => 'required|integer|exists:banks,id',
            'amount' => 'required|numeric|min:0',
            'paytype' => 'required|string|max:255',
            'cheque_number' => 'required|string|max:50',
            'is_fly_cheque' => 'required|boolean',
            'cheque_status' => 'nullable|string',
            'cheque_clearing_date' => 'nullable|date',
            'cheque_reason' => 'nullable|string',
        ]);

        $chequePay = ChequePay::findOrFail($id);
        $chequePay->update($validatedData);

        return redirect()->route('chequepay.index')->with('success', 'Cheque Pay record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chequePay = ChequePay::findOrFail($id);
        $chequePay->delete();

        return redirect()->route('chequepay.index')->with('success', 'Cheque Pay record deleted successfully.');
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

    public function updateStatus(Request $request)
    {
        $chequepay = ChequePay::findOrFail($request->id);
        $chequepay->cheque_status = $request->cheque_status;
        $chequepay->save();

        return response()->json(['success' => true]);
    }

    public function updateReason(Request $request)
    {
        $chequepay = ChequePay::findOrFail($request->id);
        $chequepay->cheque_reason = $request->cheque_reason;
        $chequepay->save();

        return response()->json(['success' => true]);
    }



}
