<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\ChartOfAccount;
use App\Models\CoaCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    public function index()
    {
        $coa = ChartOfAccount::latest()->get();

        return view('contents.coa.index',compact('coa'));
    }

    public function create()
    {
        
        $categories = CoaCategory::all();

        $q = DB::table('chart_of_accounts')->select(DB::raw('MAX(RIGHT(code,5)) as code'));
        $cd = "";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->code)+1;
                $cd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $cd = "0001";
        }

        return view('contents.coa.create',compact('categories','cd'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data,[
            'code' => 'required',
            'coa_name' => 'required',
            'category_id' => 'required',
        ],[
            'code.required' => 'Bagian ini Harus diisi',
            'coa_name.required' => 'Bagian ini dibutuhkan',
            'category_id.required' => 'Bagian ini dibutuhkan'
        ]);

        if ($validate->fails()) {
            // dd($request);
            return back()->withInput()->withErrors($validate);
        }

        ChartOfAccount::create([
            'code' => $data['code'],
            'coa_name' => $data['coa_name'],
            'category_id' => $data['category_id'],
        ]);

        return redirect('/chartofaccounts')->with('success','Data berhasil ditambahkan');

    }

    public function edit($id_coa)
    {
        $coa = ChartOfAccount::where('id_coa',$id_coa)->first();
        $categories = CoaCategory::get();

        return view('contents.coa.edit',compact('coa','categories'));
    }

    public function update(Request $request, $id_coa)
    {
        $data = $request->all();

        $validate = Validator::make($data,[
            'code' => 'required',
            'coa_name' => 'required',
            'category_id' => 'required',
        ],[
            'code.required' => 'Bagian ini Harus diisi',
            'coa_name.required' => 'Bagian ini dibutuhkan',
            'category_id.required' => 'Bagian ini dibutuhkan'
        ]);

        if ($validate->fails()) {
            // dd($request);
            return back()->withInput()->withErrors($validate);
        }

        ChartOfAccount::where('id_coa',$id_coa)->update([
            'coa_name' => $data['coa_name'],
            'category_id' => $data['category_id'],
        ]);

        return redirect('/chartofaccounts')->with('success','Data berhasil diubah');
        
    }


    public function destroy($id_coa)
    {
        $coa = ChartOfAccount::findOrFail($id_coa);

        $coa->delete();

        return redirect('/chartofaccounts')->with('success','Data berhasil dihapus');

    }
}
