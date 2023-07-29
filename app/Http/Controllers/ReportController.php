<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CoaCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $categories = CoaCategory::latest()->get();
        $transactions = Transaction::latest()->get();
        // Prepare the unique transaction dates
    //     $uniqueDates = $transactions->pluck('transaction_date')->unique()->toArray();

    // // Filter transactions based on a specific month (for example, August 2023)
    //     $month = 7; // August
    //     $year = 2023;
    //     $filteredTransactions = $transactions->filter(function ($transaction) use ($month, $year) {
    //         return Carbon::parse($transaction->transaction_date)->month === $month && Carbon::parse($transaction->transaction_date)->year === $year;
    //     });

    // // Prepare the unique transaction dates for the filtered transactions
    //      $uniqueDates = $filteredTransactions->pluck('transaction_date')->unique()->toArray();
        return view('contents.report.index',compact('categories','transactions'));
    }
}
