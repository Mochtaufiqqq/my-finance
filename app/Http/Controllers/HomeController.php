<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();
        $thisYear = Carbon::now()->startOfYear();

        $incomeToday = Transaction::where('transaction_date')->sum('debit');
        // $incomeThisMonth = $transactions->where('transaction_date', '>=', $thisMonth)->where( 'debit')->sum('amount');
        // $incomeThisYear = $transactions->where('transaction_date', '>=', $thisYear)->where( 'debit')->sum('amount');

        // $expenseToday = $transactions->where('transaction_date', $today)->where( 'credit')->sum('amount');
        // $expenseThisMonth = $transactions->where('transaction_date', '>=', $thisMonth)->where( 'credit')->sum('amount');
        // $expenseThisYear = $transactions->where('transaction_date', '>=', $thisYear)->where( 'credit')->sum('amount');

        return view('contents.dashboard',compact('incomeToday'));
    }
}

