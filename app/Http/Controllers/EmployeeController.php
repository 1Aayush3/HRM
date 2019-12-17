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
use Session;

class EmployeeController extends Controller
{
    public function index()
    {   
        $users = User::with(['designation'])->select('id','name', 'email', 'designation_id')->get();
        return View('Pages.Employee.index',compact('users'));
    }

    public function create()
    {
        $des = Designation::pluck('designation','id');
        return View('Pages.Employee.create',compact('des'));
    }

    public function store(formValidation $request)
    {
        $request->merge(['password' => Hash::make($request->get('password')),
        ]);
        $user = User::create($request->all());
        $this->storeImage($user);
        Session::flash('message', 'Employee registered sucessfully!');
        return Redirect()->route('employees.index');
    }

    public function show($id)
    {            
        $user = User::with(['designation'])->Find($id);
        // dd($user);
        return View('Pages.Employee.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::with(['designation'])->find($id);
        $des = Designation::pluck('designation','id');
        return View('Pages.Employee.edit',compact('user','des'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data["_method"], $data["_token"],$data["password"]);
        $arrays = array_keys($data,null);
        foreach($arrays as $array){
            unset($data[$array]);
        }
        $update = User::find($id);
        // dd($update);
        $user= $update->update($data);
        $user= $update;
        $this->storeImage($user);
        Session::flash('message', 'Changes saved sucessfully!');
       return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        Session::flash('message', 'Employee Terminated!');
        return redirect()->route('employees.index');
    }

    public function storeImage($user)
    {
        // dd($user);
        $id= $user->id;
        $fields=['image','cit_img','citizenship','pan_img','contract','appointment'];
        foreach($fields as $field){
            if (request()->has($field)){
                $user-> update([
                    $field=> request()
                    ->{$field}
                    ->storeAs('Profile'.$id,$field.".".request()->{$field}->getClientOriginalExtension(),'public'),
                ]);
                $image= Image::make(public_path('storage/'.$user->{$field}))->fit(300,300);
                $image->save();
            }
        }
    }    
}