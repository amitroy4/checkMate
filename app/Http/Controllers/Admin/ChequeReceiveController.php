<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChequeReceive;
use App\Models\Client;

class ChequeReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $clients = Client::all();
        $banks = Bank::all();
        $chequereceives = ChequeReceive::all();
        return view('admin.chequereceive.cheque-receive',compact('companies','clients','banks','chequereceives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('status', 1)->get();
        $clients = Client::where('status', 1)->get();
        $banks = Bank::all();
        return view('admin.chequereceive.addcheque-receive',compact('companies','clients','banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'company_id' => 'required|integer|exists:companies,id',
            'cheque_date' => 'required|date',
            'client_id' => 'required|integer',
            'bank_id' => 'required|integer|exists:banks,id',
            'amount' => 'required|numeric|min:0',
            'receivetype' => 'required|string|max:255',
            'cheque_receiver_name' => 'required|string|max:255',
            'cheque_number' => 'required|string|max:50',
            'is_fly_cheque' => 'required|boolean',
            'cheque_status' => 'nullable|string',
            'cheque_clearing_date' => 'nullable|date',
            'cheque_reason' => 'nullable|string',
        ]);

        ChequeReceive::create($validatedData);

        return redirect()->route('chequereceive.index')->with('success', 'Cheque Receive record created successfully!');
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
        $chequereceive = ChequeReceive::findOrFail($id);
        $companies = Company::all();
        $clients = Client::all();
        $banks = Bank::all();
        return view('admin.chequereceive.editcheque-receive', compact('chequereceive', 'companies', 'clients', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|integer|exists:companies,id',
            'cheque_date' => 'required|date',
            'client_id' => 'required|integer',
            'bank_id' => 'required|integer|exists:banks,id',
            'amount' => 'required|numeric|min:0',
            'receivetype' => 'required|string|max:255',
            'cheque_receiver_name' => 'required|string|max:255',
            'cheque_number' => 'required|string|max:50',
            'is_fly_cheque' => 'required|boolean',
            'cheque_status' => 'nullable|string',
            'cheque_clearing_date' => 'nullable|date',
            'cheque_reason' => 'nullable|string',
        ]);

        $ChequeReceive = ChequeReceive::findOrFail($id);
        $ChequeReceive->update($validatedData);

        return redirect()->route('chequereceive.index')->with('success', 'Cheque Receive record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ChequeReceive = ChequeReceive::findOrFail($id);
        $ChequeReceive->delete();

        return redirect()->route('chequereceive.index')->with('success', 'Cheque Receive record deleted successfully.');
    }

    public function clientStore(Request $request)
    {
        Client::create($request->all());
        return redirect()->back()->with('success', 'Client added successfully.');
    }

    public function bankStore(Request $request)
    {
        Bank::create($request->all());
        return redirect()->back()->with('success', 'bank added successfully.');
    }

    public function updateStatus(Request $request)
    {
        $chequereceive = ChequeReceive::findOrFail($request->id);
        $chequereceive->cheque_status = $request->cheque_status;
        $chequereceive->save();

        return response()->json(['success' => true]);
    }

    public function updateReason(Request $request)
    {
        $chequereceive = ChequeReceive::findOrFail($request->id);
        $chequereceive->cheque_reason = $request->cheque_reason;
        $chequereceive->save();

        return response()->json(['success' => true]);
    }
}
