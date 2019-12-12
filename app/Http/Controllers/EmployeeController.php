<?php
namespace App\Http\Controllers;

use DB;
use App\User;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\formValidation;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function index()
    {
        $des= Designation::all();
        $users = User::with(['users'])->pluck('name', 'email', 'designation_id');
        return View('Pages.Employee.index', compact('users', 'des'));
    }

    public function create()
    {
        $des = Designation::pluck('designation', 'id');
        return View('Pages.Employee.create', compact('des'));
    }

    public function store(formValidation $request)
    {
        $request->merge(['password' => Hash::make($request->get('password'))]);
        $user = User::create($request->all());
        $this->storeImage($user);
        // Session::flash('message', 'Employee registered sucessfully!');
        return Redirect()->route('Pages.Employee.index')->withSuccess('Great! Form successfully submit with validation.');
    }

    public function show($id)
    {
        $user = User::find($id);
        $des =  Designation::where('id', $user->designation_id)->pluck('designation');
        return View('Pages.Employee.show');
    }

    public function edit($id)
    {
        $designation = Designation::pluck('name', 'id');
        return View('Pages.Employee.edit')
            ->with('User', $User)->with('designation', $designation);
    }

    public function update(Request $request, $id)
    {
        // $users->name = $request->get('name');
        // $users->email = $request->get('email');
        // $users->password = $request->get('password');
        // $users->alt_email = $request->get('alt_email');
        // $users->dob = $request->get('dob');
        // $users->joined = $request->get('joined');
        // $users->left = $request->get('left');
        // $users->review = $request->get('review');
        // $users->designation_id = $request->get('designation_id');
        // $users->pan = $request->get('pan');
        // $users->cit = $request->get('cit');
        // $users->bank = $request->get('bank');
        // $users->acc = $request->get('acc');
        // $users->branch = $request->get('branch');
        // $users->image = $request->get('image');
        // $users->cit_img = $request->get('cit_img');
        // $users->citizenship = $request->get('citizenship');
        // $users->pan_img = $request->get('pan_img');
        // $users->contract = $request->get('contract');
        // $users->appointment = $request->get('appointment');
        // $users->save();
        // Session::flash('message', 'Employee registered sucessfully!');
        // return Redirect()->route('Pages.Employee.index');
    }

    public function destroy($id)
    {
        $users->delete();
        return redirect()->route('Pages.Employee.index');
    }

    public function storeImage($user)
    {
        $fields=['image','cit_image','citizenship','pan_img','contract','appointment'];
        foreach ($fields as $field) {
            if (request()->has($field)) {
                $user-> update([
                    $field=> request()->{$field}->store($field, 'public'),
                ]);
                $image= Image::make(public_path('storage/'.$user->{$field}))->fit(300, 300);
                $image->save();
            }
        }
        // if (request()->has('cit_img')){
        //     $user-> update([
        //         'cit_img'=> request()->cit_img->store('cit_img','public'),
        //     ]);
        // }
        // if (request()->has('citizenship')){
        //     $user-> update([
        //         'citizenship'=> request()->citizenship->store('citizenship','public'),
        //     ]);
        // }
        // if (request()->has('pan_img')){
        //     $user-> update([
        //         'pan_img'=> request()->pan_img->store('pan_img','public'),
        //     ]);
        // }
        // if (request()->has('contract')){
        //     $user-> update([
        //         'contract'=> request()->contract->store('appointment','public'),
        //     ]);
        // }
        // if (request()->has('appointment')){
        //     $user-> update([
        //         'appointment'=> request()->appointment->store('appointment','public'),
        //     ]);
        // }
    }
}
