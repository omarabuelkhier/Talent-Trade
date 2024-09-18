<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Employee;
use App\Models\JobPost;
use App\Models\User;
use App\Notifications\Status;
use App\Notifications\StatusCandidateFromEmployee;
use Illuminate\Support\Facades\Notification;

class ApplicationController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_employee');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //user data
        $cand = Candidate::findOrFail($application->candidate_id);
        $user = User::findOrFail($cand->user_id);

        $application->job_status = "approved";
        $application->save();


        //notification data
        $jobPost = JobPost::findOrFail($application->job_post_id);
        $emp = Employee::findOrFail($jobPost->employee_id);
        $EmpUser = User::findOrFail($emp->user_id);
        $username = $EmpUser->name;
        $userImage = $EmpUser->image;
        $created_at = $application->updated_at;
        $userRole = $EmpUser->role;
        $job_id = $application->job_post_id;
        $job_status = $application->job_status;
        Notification::send($user, new StatusCandidateFromEmployee($username, $userImage, $created_at, $userRole, $job_id, $job_status));
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //user data


    }
    public function reject(Application $application)
    {
        $cand = Candidate::findOrFail($application->candidate_id);
        $user = User::findOrFail($cand->user_id);
        $application->job_status = "reject";
        $application->save();

        //notification data
        $jobPost = JobPost::findOrFail($application->job_post_id);
        $emp = Employee::findOrFail($jobPost->employee_id);
        $EmpUser = User::findOrFail($emp->user_id);
        $username = $EmpUser->name;
        $userImage = $EmpUser->image;
        $created_at = $application->updated_at;
        $userRole = $EmpUser->role;
        $job_id = $application->job_post_id;
        $job_status = $application->job_status;
        Notification::send($user, new StatusCandidateFromEmployee($username, $userImage, $created_at, $userRole, $job_id, $job_status));
        return redirect()->back();
    }
}
