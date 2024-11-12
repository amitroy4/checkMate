<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ChequePay;
use App\Models\ChequeReceive;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
    public function dashboard()
    {
        $todayTotalPayAmount = ChequePay::whereDate('created_at', Carbon::today())->where('is_fly_cheque', 0)->sum('amount');
        $todayTotalReceiveAmount = ChequeReceive::whereDate('created_at', Carbon::today())->where('is_fly_cheque', 0)->sum('amount');
        $last7DaysTotalPayAmount = ChequePay::whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->where('is_fly_cheque', 0)->sum('amount');
        $last7DaysTotalReceiveAmount = ChequeReceive::whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->where('is_fly_cheque', 0)->sum('amount');


        $sevendays = [];
        $sevenamounts = [];

        for ($i = 6; $i >= 0; $i--) {
            // Get the date for each day in the past 7 days
            $date = Carbon::now()->subDays($i)->toDateString();

            // Store "Day X" label
            $sevendays[] = 'Day ' . ($i+1);

            // Calculate the total amount for that day and cast it to a string
            $dailyTotal = (string) ChequePay::whereDate('created_at', '=', $date)->where('is_fly_cheque', 0)->sum('amount');

            // If no data, set the total to "0" as a string
            $sevenamounts[] = $dailyTotal;
        }

        $sevendaysrec = [];
        $sevenamountsrec = [];

        for ($i = 29; $i >= 0; $i--) {
            // Get the date for each day in the past 7 days
            $date = Carbon::now()->subDays($i)->toDateString();

            // Store "Day X" label
            $sevendaysrec[] = 'Day ' . ($i+1);

            // Calculate the total amount for that day and cast it to a string
            $dailyTotal = (string) ChequeReceive::whereDate('created_at', '=', $date)->where('is_fly_cheque', 0)->sum('amount');

            // If no data, set the total to "0" as a string
            $sevenamountsrec[] = $dailyTotal;
        }

        // Debugging output (optional, for verification)
        // dd($sevendaysrec, $sevenamountsrec);

        return view('admin.dashboard',compact('todayTotalPayAmount','todayTotalReceiveAmount','last7DaysTotalPayAmount','last7DaysTotalReceiveAmount','sevendays','sevenamounts','sevendaysrec','sevenamountsrec'));
    }
}
