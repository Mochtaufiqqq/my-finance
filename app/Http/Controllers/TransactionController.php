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
            'debit' => 'required_without:credit|nullable|numeric', // Required if credit is empty, and it should be numeric
            'credit' => 'required_without:debit|nullable|numeric', // Required if debit is empty, and it should be numeric
        ],[
            'transaction_date.required' => 'Tanggal transaksi dibutuhkan',
            'coa_id.required' => 'Bagian ini tidak boleh kosong',
            'desc' => 'Keterangan dibutuhkan',
            'debit.required_without' => 'Bagian ini harus diisi',
            'credit.required.without' => 'Bagian ini harus diisi',
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
            // dd($request);
        }

        date_default_timezone_set('Asia/Bangkok');

        Transaction::create([
            'transaction_date' => date('Y-m-d h:i:s'),
            'coa_id' => $data['coa_id'],
            'desc' => $data['desc'],
            'debit' => $data['debit'] ?? null,
            'credit' => $data['credit'] ?? null,
        ]);

        return redirect('/transactions')->with('success','Data transaksi berhasil ditambahkan');
        // dd($request);
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
            'debit' => 'required_without:credit|nullable|numeric', // Required if credit is empty, and it should be numeric
            'credit' => 'required_without:debit|nullable|numeric', // Required if debit is empty, and it should be numeric
        ],[
            'transaction_date.required' => 'Tanggal transaksi dibutuhkan',
            'coa_id.required' => 'Bagian ini tidak boleh kosong',
            'desc' => 'Keterangan dibutuhkan',
            'debit.required_without' => 'Bagian ini harus diisi',
            'credit.required.without' => 'Bagian ini harus diisi',
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
            // dd($request);
        }

        date_default_timezone_set('Asia/Bangkok');

        Transaction::where('id_transaction',$id_transaction)->update([
            'transaction_date' => date('Y-m-d h:i:s'),
            'coa_id' => $data['coa_id'],
            'desc' => $data['desc'],
            'debit' => $data['debit'] ?? null,
            'credit' => $data['credit'] ?? null ,
        ]);

        return redirect('/transactions')->with('success','Data transaksi berhasil diubah');

    }

    public function destroy($id_transaction)
    {
        Transaction::findOrFail($id_transaction)->delete();

        return redirect('/transactions')->with('success','Data transaksi berhasil dihapus');

    }

    public function trash()
    {
        $transactions = Transaction::onlyTrashed()->latest()->get();

        return view('contents.transaction.trash',compact('transactions'));
    }

    public function forceDelete($id_transaction)
    {
        Transaction::onlyTrashed()->findOrFail($id_transaction)->forceDelete();

        return redirect('/transactions/trash')->with('success','Data transaksi berhasil dihapus');
    }

    public function restore($id_transaction)
    {
        Transaction::onlyTrashed()->findOrFail($id_transaction)->restore();

        return redirect('/transactions')->with('success','Data transaksi berhasil dikembalikan');
    }

}
