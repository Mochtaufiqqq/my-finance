<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();

        return view('contents.transaction.index',compact('transactions'));
    }

    public function create()
    {
        $coa = ChartOfAccount::latest()->get();

        return view('contents.transaction.create',compact('coa'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data,[
            'transaction_date' => 'required',
            'coa_id' => 'required',
            'desc' => 'required',
            'transaction_type' => 'required',
            // 'debit' => 'decimal',
            // 'credit' => 'decimal'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
            // dd($request);
        }

        date_default_timezone_set('Asia/Bangkok');

        Transaction::create([
            'transaction_date' => date('Y-m-d-h-i-s'),
            'coa_id' => $data['coa_id'],
            'desc' => $data['desc'],
            'transaction_type' => $data['transaction_type'],
            'debit' => $data['debit'] ?? '100',
            'credit' => $data['credit'] ?? '100',
        ]);

        // return redirect('/transactions')->with('success','Data transaksi berhasil ditambahkan');
        dd($request);
    }

    public function edit($id_transaction)
    {
        $coa = ChartOfAccount::get();
        $transactions = Transaction::where('id_transaction',$id_transaction)->first();

        return view('contents.transaction.edit',compact('coa','transactions'));
    }

    public function update(Request $request, $id_transaction)
    {
        $data = $request->all();

        $validate = Validator::make($data,[
            'transaction_date' => 'required',
            'coa_id' => 'required',
            'desc' => 'required',
            'transaction_type' => 'required',
            // 'debit' => 'decimal',
            // 'credit' => 'decimal'
        ]);

        if ($validate->fails()) {
            // return back()->withInput()->withErrors($validate);
            dd($request);
        }

        date_default_timezone_set('Asia/Bangkok');

        Transaction::where('id_transaction',$id_transaction)->update([
            'transaction_date' => date('Y-m-d-h-i-s'),
            'coa_id' => $data['coa_id'],
            'desc' => $data['desc'],
            'transaction_type' => $data['transaction_type'],
            'debit' => $data['debit'] ??'100',
            'credit' => $data['credit'] ??'100' ,
        ]);

        return redirect('/transactions')->with('success','Data transaksi berhasil diubah');

    }
}
