<?php
namespace App\Http\Controllers;

use DB;
use Session;
use App\User;
use App\Designation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\formValidation;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','show']]);
        $this->middleware('permission:employee-create', ['only' => ['create','store']]);
        $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::with(['designation'])->select('id', 'name', 'email', 'designation_id')->get();
        return View('Pages.Employee.index', compact('users'));
    }

    public function create()
    {
        $des = Designation::pluck('designation', 'id');
        $roles = Role::pluck('name', 'name')->all();
        return View('Pages.Employee.create', compact('des', 'roles'));
    }

    public function store(formValidation $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $this->storeImage($user);
        $user->assignRole($request->input('role_id')); // overwritten as employee
        Session::flash('message', 'Employee registered sucessfully!');
        return Redirect()->route('employees.index');
    }

    public function show($id)
    {
        $user = User::with(['designation'])->Find($id);
        return View('Pages.Employee.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with(['designation'])->find($id);
        $des = Designation::pluck('designation', 'id');
        $roles = Role::pluck('name', 'name')->all();
        return View('Pages.Employee.edit', compact('user', 'des', 'roles'));
    }

    public function update(formValidation $request, $id)
    {
        $data = $request->all();
        unset($data["_method"], $data["_token"],$data["password"]);
        $arrays = array_keys($data, null);
        foreach ($arrays as $array) {
            unset($data[$array]);
        }
        $update = User::find($id);
        $user= $update->update($data);
        $user= $update;
        $this->storeImage($user);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('role_id'));
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
        $id= $user->id;
        $fields=['image','cit_img','citizenship','pan_img','contract','appointment'];
        foreach ($fields as $field) {
            if (request()->has($field)) {
                $user-> update([
                    $field=> request()
                    ->{$field}
                    ->storeAs('Profile'.$id, $field.".".request()->{$field}->getClientOriginalExtension(), 'public'),
                ]);
                $image= Image::make(public_path('storage/'.$user->{$field}))->fit(300, 300);
                $image->save();
            }
        }
    }
}
