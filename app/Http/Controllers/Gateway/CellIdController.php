<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Imports\CellIdImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CellIdController extends Controller
{
    public function addCellID(Request $request)
    {
        $request['file'];

        Excel::import(new CellIdImport, $request['file']);
        return response('Got it')->header('Content-Type','application/json');
    }

    public function import()
    {

    }
}
