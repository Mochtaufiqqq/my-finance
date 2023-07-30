<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\CoaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CoaCategory::latest()->get();

        return view ('contents.category.index',compact('categories'));
    }


    public function store(Request $request) 
    {
        $data = $request->all();

        $validate = Validator::make($data,[
            'name' => 'required'
        ],[
            'name.required' => 'Nama kategori harus diisi'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        CoaCategory::create([
            'name' => $data['name']
        ]);
        
        return redirect('/categories')->with('success','Data kategori berhasil ditambahkan');
    }

    public function update(Request $request,$id_category)
    {
        $data = $request->all();

        $validate = Validator::make($data,[
            'name' => 'required'
        ],[
            'name.required' => 'Nama kategori harus diisi'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        CoaCategory::where('id_category',$id_category)->update([
            'name' => $data['name']

        ]);

        return redirect('/categories')->with('success','Data kategori berhasil diubah');

    }

    public function destroy($id_category)
    {

        $hasCoa = ChartOfAccount::where('category_id', $id_category)->exists();
        if ($hasCoa) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus Kategori karena memiliki COA terkait.');
        }

        CoaCategory::findOrFail($id_category)->delete();


        return redirect('/categories')->with('success','Data kategori berhasil dihapus');

    }
    
}


