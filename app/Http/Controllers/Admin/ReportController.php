<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChequePay;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function paymentRegisterPdf(Request $request)
{
    // Apply filters
    $query = ChequePay::query();

    if ($request->fromDate && $request->toDate) {
        $query->whereBetween('cheque_date', [$request->fromDate, $request->toDate]);
    }

    if ($request->payee) {
        $query->whereHas('payee', function($q) use ($request) {
            $q->where('vendor_name', $request->payee);
        });
    }

    if ($request->bank) {
        $query->whereHas('bank', function($q) use ($request) {
            $q->where('bank_name', $request->bank);
        });
    }

    if ($request->paytype) {
        $query->where('paytype', $request->paytype);
    }

    // Fetch filtered results
    $chequepays = $query->get();

    // Load view and pass data

    $html = view('admin.report.chequepaymentregisterreport', compact('chequepays'))->render();

        // Generate the PDF using the Pdf facade
        $pdf = Pdf::loadHTML($html);
        // $pdf->setPaper('A4', 'portrait');

        // Output the generated PDF
        return $pdf->stream('chequepaymentregisterreport.pdf');
}

}
