<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class DatatableController extends Controller
{
    public function getCategories(Request $request)
    {
        $data = \App\Models\CoaCategory::getCategories($request->query());
        return DataTables::of($data)->make(true);
    }

    
}
