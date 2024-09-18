<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Candidate;
use App\Models\Comment;
use App\Models\Employee;
use App\Models\JobPost;
use App\Models\Application;
use App\Models\User;
use App\Notifications\Status;
use App\Notifications\StatusCandidate;
use App\Notifications\StatusEmployee;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function store(StoreCommentRequest $request, Comment $comment,User $user)
    {

        $data = $request->all();
        //User who received notification
        $job = JobPost::findOrFail($data['job_post_id']);
        $emp =Employee::findOrFail($job->employee_id);
        $user= User::findOrFail($emp->user_id);

        $candidate = Candidate::where('user_id', Auth::id())->first();
        $data['candidate_id'] = $candidate->id;
        $post = JobPost::findOrFail($data['job_post_id']);
        $post->comments()->create($data);
       $application= Application::create([
            'job_post_id' => $data['job_post_id'],
            'candidate_id' => $data['candidate_id'],
        ]);

       //Notification data
        $cand = Candidate::findOrFail($application->candidate_id);
        $UserCandidate = User::findOrFail($cand->user_id);
        $username = $UserCandidate->name;
        $userImage = $UserCandidate->image;
        $userRole= $UserCandidate->role;
        $candidateId =$cand->id;

        Notification::send($user,new StatusCandidate($username,$application->created_at,$userImage,$userRole,$candidateId));
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
