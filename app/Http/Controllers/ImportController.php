<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    public function importExportView()
    {
        return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' =>'required|mimes:xls,xlsx'
        ]);
        Excel::import(new UserImport, request()->file('file'));
        return redirect()->route('employees.index')->with('message', 'Successfuly Data Imported!');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
