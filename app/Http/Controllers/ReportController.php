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
        
        return view('contents.report.index');
    }

    public function getReport(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $transactions = Transaction::whereBetween('transaction_date',[$from, $to])->get();

        return view('contents.report.index',compact('transactions','from','to'));

    }
}
