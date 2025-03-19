<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobPostRequest;
use App\Http\Requests\UpdateJobPostRequest;
use App\Models\JobPost;
use App\Models\Category;
use App\Models\Technology;
use App\Models\TechnologyJob;
use App\Notifications\Status;
use App\Notifications\StatusAdmin;
use App\Notifications\StatusEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Notification;

class JobPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_employee')->except('index','pending_post','reject_status','approved_status','show','search');
        $this->middleware('is_admin')->only('pending_post','reject_status','approved_status');



    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $JobPosts = JobPost::where('status','=','approved')->paginate(2);
        $employees = Employee::all();
        return view('JobPosts.index', compact('JobPosts', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobPosts = JobPost::all();
        $categories = Category::all();
        $technologies = Technology::all();
        return view('JobPosts.create', compact('jobPosts', 'categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPostRequest $request)
    {
        $request_data = $request->all();
        //Notification user Data
        $user=User::where('role', '=', 'admin')->first();
        $employee = Employee::where('user_id','=',Auth::id())->first();
        $userEmployee = User::where('id','=',$employee->user_id)->first();
        $username = $userEmployee->name;
        $userImage = $userEmployee->image;


        //create a new jopPost
        $request_data['employee_id'] = $employee->id;
        $jobPost = JobPost::create($request_data);

        $tech = $request_data['technology_id'];
        foreach ($tech as $technology) {
            TechnologyJob::create([
                    'technology_id' => $technology,
                    'job_post_id' => $jobPost->id

            ]);
        }

        //Notification Post Data
        $job=JobPost::where('id','=',$jobPost->id)->first();
        $created_at = $job->created_at;
        Notification::send($user,new StatusAdmin($username,$userImage,$created_at));
        return  to_route('jobPosts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        if (isset(\request()->all()['id'])){

            $id=\request()->all()['id'];
            $readable= Auth::user()->notifications;
            foreach ($readable as $read){
                if($read->id == $id){
                    $read->markAsRead();
                }
            }
        }
        $comments =  Comment::where('job_post_id', $jobPost->id)->get();
        $users = User::all();

        // dd($jobPost);
        return view('JobPosts.show', compact('jobPost', 'comments', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request,JobPost $jobPost)
    {
        if ($request->user()->can('update',$jobPost)){
            abort(401);
        }
        $categories = Category::all();
        $technologies = Technology::all();

        return view('JobPosts.update', compact('jobPost', 'categories', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobPostRequest $request, JobPost $jobPost)
    {

        $request_data = $request->all();
        $employee = Employee::where('user_id','=',Auth::id())->first();
        $request_data['employee_id'] = $employee->id;
        $jobPost->update($request_data);
        $TechnologyJob = TechnologyJob::where('job_post_id','=',$jobPost->id)->get();
        foreach ($TechnologyJob as $Tech){
            $Tech->delete();
    }
        $tech = $request_data['technology_id'];
        foreach ($tech as $technology) {
            TechnologyJob::create([
                'technology_id' => $technology,
                'job_post_id' => $jobPost->id

            ]);
        }
        return  to_route('jobPosts.show',$jobPost);
/*        return redirect()->route('jobPosts.index', compact('jobPost'))->with('success', 'Job post updated successfully');*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        $jobPost->delete();
        return redirect()->back();
    }
    public function reject_status(JobPost $jobPost){
        $emp = Employee::findOrFail($jobPost->employee_id);
        $user = User::findOrFail($emp->user_id);
        $jobPost->status = 'rejected';
        $jobPost->save();
        Notification::send($user,new StatusEmployee($jobPost->created_at,$jobPost->status,$jobPost->id));
        return redirect()->back();
    }
    public function approved_status(JobPost $jobPost){
        $emp = Employee::findOrFail($jobPost->employee_id);
        $user = User::findOrFail($emp->user_id);
        $jobPost->status = 'approved';
        $jobPost->save();
        Notification::send($user,new StatusEmployee($jobPost->created_at,$jobPost->status,$jobPost->id));
        return redirect()->back();
    }
    public function pending_post()
    {
        if (isset(\request()->all()['id'])){

            $id=\request()->all()['id'];
            $readable= Auth::user()->notifications;
            foreach ($readable as $read){
                if($read->id == $id){
                    $read->markAsRead();
                }
            }
        }


        $pendingPosts = JobPost::where('status','=','pending')->paginate(2);
        $employees = Employee::all();
        return view('JobPosts.pendingPosts', compact('pendingPosts'));
    }
    public function search(Request $request){
        $search = $request->input('search');
        $result = JobPost::where('title', 'like', '%' . $search . '%')->
        orwhere('description', 'like', '%' . $search . '%')->
        orwhere('location', 'like', '%' . $search . '%')
        ->paginate(2);
        // dd($result);
        return view('JobPosts.index', compact('result'));
    }
}
