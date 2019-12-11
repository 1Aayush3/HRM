<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Designation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::with(['users'])->pluck('name', 'email', 'designation_id');
        // ->where('designation_id', Designation::table('id'));
        return View('Pages.Employee.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Pages.Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        {
        $rules = array(
            'name'       => 'bail|required',
            
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect()->back()
                ->withErrors($validator)->with('error', 'invalid data');
        } else {
            $users = new User;
            $users->name = $request->get('name');
            $users->email = $request->get('email');
            $users->password = $request->get('password');
            $users->alt_email = $request->get('alt_email');
            $users->dob = $request->get('dob');
            $users->joined = $request->get('joined');
            $users->left = $request->get('left');
            $users->review = $request->get('review');
            $users->designation_id = $request->get('designation_id');
            $users->pan = $request->get('pan');
            $users->cit = $request->get('cit');
            $users->bank = $request->get('bank');
            $users->acc = $request->get('acc');
            $users->branch = $request->get('branch');
            $users->image = $request->get('image');
            $users->cit_img = $request->get('cit_img');
            $users->citizenship = $request->get('citizenship');
            $users->pan_img = $request->get('pan_img');
            $users->contract = $request->get('contract');
            $users->appointment = $request->get('appointment');
            $users->save();
            Session::flash('message', 'Employee registered sucessfully!');
            return Redirect()->route('Pages.Employee.index');
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = $user->designation_id;
            
        $team = Team::find($id);
        $team = $team->name;
        
        return View('Pages.Employee.show')
            ->with('player', $player)->with('team', $team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::pluck('name', 'id');
        // show the edit form and pass the player
        return View('Pages.Employee.edit')
            ->with('User', $User)->with('designation', $designation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'date'             => 'before_or_equal:today',
            
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect()->back()
                ->withErrors($validator)->with('error', 'invalid data');
        } else {
            $users->name = $request->get('name');
            $users->email = $request->get('email');
            $users->password = $request->get('password');
            $users->alt_email = $request->get('alt_email');
            $users->dob = $request->get('dob');
            $users->joined = $request->get('joined');
            $users->left = $request->get('left');
            $users->review = $request->get('review');
            $users->designation_id = $request->get('designation_id');
            $users->pan = $request->get('pan');
            $users->cit = $request->get('cit');
            $users->bank = $request->get('bank');
            $users->acc = $request->get('acc');
            $users->branch = $request->get('branch');
            $users->image = $request->get('image');
            $users->cit_img = $request->get('cit_img');
            $users->citizenship = $request->get('citizenship');
            $users->pan_img = $request->get('pan_img');
            $users->contract = $request->get('contract');
            $users->appointment = $request->get('appointment');
            $users->save();
            Session::flash('message', 'Employee registered sucessfully!');
            return Redirect()->route('Pages.Employee.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $users->delete();
    //     return redirect()->route('Players.index');
    // }
}
