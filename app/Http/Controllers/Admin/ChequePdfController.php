<?php

namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\ChequePay;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\ChequeReceive;

class ChequePdfController extends Controller
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
    public function generateChequePayeePdf($chequePayeeId)
    {
        // Query the data based on the cheque payee ID
        $chequePay = ChequePay::with(['company', 'payee', 'bank'])->find($chequePayeeId);

        // Ensure the record exists
        if (!$chequePay) {
            abort(404, 'Cheque Payee not found.');
        }


        // Pass data to the view
        $html = view('admin.chequeprint.chequepayeepdf', compact('chequePay'))->render();

        // Generate the PDF using the Pdf facade
        $pdf = Pdf::loadHTML($html);
        // $pdf->setPaper('A4', 'portrait');

        // Output the generated PDF
        return $pdf->stream('chequepayee.pdf');
    }
    public function generatechequeReceivePdf($chequeReceiveId)
    {
        // Query the data based on the cheque payee ID
        $chequeReceive = ChequeReceive::with(['company', 'client', 'bank'])->find($chequeReceiveId);

        // Ensure the record exists
        if (!$chequeReceive) {
            abort(404, 'Cheque Payee not found.');
        }


        // Pass data to the view
        $html = view('admin.chequeprint.chequereceivepdf', compact('chequeReceive'))->render();

        // Generate the PDF using the Pdf facade
        $pdf = Pdf::loadHTML($html);
        // $pdf->setPaper('A4', 'portrait');

        // Output the generated PDF
        return $pdf->stream('chequereceive.pdf');
    }
}
