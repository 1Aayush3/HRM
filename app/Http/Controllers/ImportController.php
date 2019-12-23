<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ImportController extends Controller
{
    public function importExportView()
    {
       return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        $this->validate($request,[
            'file' =>'required|mimes:xls,xlsx'
        ]);
        // $path= $request->file('file')->getRealPath();
        // $data= Excel::load($path)->get();
        Excel::import(new UserImport,request()->file('file'));
        return redirect()->route('employees.index')->with('message','Successfuly Data Imported!');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
