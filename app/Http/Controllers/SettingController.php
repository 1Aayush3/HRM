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
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $des=designation::select('designation', 'id')->get();
        
        return view('Pages.Setting.index', compact('des'));
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
        $des   =   designation::updateOrCreate(['id' => $desId],
        ['designation' => $request->designation]);   
        return Response::json($des);
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
    public function edit(Request $request,$id)
    {
        //     
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
        $validatedData = $request->validate([
            'designation'=>'required|min:2|max:40|unique:designations,designation|regex:/^[\pL\s\-]+$/u',
        ]);
        $des = designation::find($request->id);
        $update = $des->update($validatedData);
        return response()->json($des, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        designation::find($id)->delete();
        if($request->ajax()){
           return Response::json("terminated",200);
        }   
        return redirect()->route('settings.index');
    }
}
