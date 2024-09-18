<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_employee')->except('create','store','show',"index",'destroy');
        $this->middleware('Create_Without_Role')->only('create','store');
        $this->middleware('is_admin')->only('index','destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::paginate(2);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id=Auth::user()->id;
        return view('employee.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        if ($request->hasFile("logo")) {
            $logo = $request->file("logo");
            $logoPath = $logo->store("logo", "user_image");
        }

        $data = $request->all();
        $data['logo'] = $logoPath ?? null;
        Employee::create($data);

        $user = User::findOrFail(Auth::id());
        $user['role'] = "employee";
        $user->save();

        return to_route('jobPosts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(\Illuminate\Http\Request $request,Employee $employee)
    {
        $jobs = JobPost::where("employee_id",'=',$employee->id)->paginate(2);
        return view('employee.show', compact('employee', 'jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\Illuminate\Http\Request $request, Employee $employee)
    {
        if ($request->user()->cannot('update',$employee)){
        abort(401);
    };
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

        if ($request->hasFile("logo")) {
            $logo = $request->file("logo");
            $logoPath = $logo->store("logo", "user_image");
            $employee->logo = $logoPath;
        }

        $employee->update($request->all());
        return redirect()->route('employee.show', $employee->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back();
    }
}
