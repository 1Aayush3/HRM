<?php

namespace App\Http\Controllers;

use App\designation;
use Illuminate\Http\Request;
use Session;
use Response;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','show']]);
        $this->middleware('permission:employee-create', ['only' => ['create','store']]);
        $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //     $des=designation::select('designation','id')->get();
        //    return view('Pages.Setting.index',compact('des'));
        if (request()->ajax()) {
            return datatables()->of(designation::select('*'))
            ->addColumn('action', 'action_button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('Pages.Setting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'designation'=>'required|min:2|max:40|unique:designations,designation|regex:/^[\pL\s\-]+$/u',
        ]);

        $desId = $request->id;
        $des   =   designation::updateOrCreate(
            ['id' => $desId],
            ['designation' => $request->designation]
        );
        return Response::json($des);
        // $designation = new designation;
        // $designation->designation = $request->get('designation');
        // $designation->save();
        // $latest=designation::latest()->first();
        // return response()->json($latest,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $des  = designation::where($where)->first();
        return Response::json($des);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, designation $designation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $des = designation::where('id', $id)->delete();
        return Response::json($des);
        // designation::find($id)->delete();
        // return redirect()->route('settings.index');
    }
}
