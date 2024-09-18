<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\Technology;
use App\Models\CandidateTechnology;

use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_candidate')->except('create','store','show','index');
        $this->middleware('Create_Without_Role')->only('create','store');
        $this->middleware('is_admin')->only('index','destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::paginate(2);
        return view('candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidate.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {

        if ($request->hasFile("cv")){
            $cv = $request->file("cv");
            $cvName = $cv->store("Cv","user_image");
        }
        $data = $request->all();
        $data['cv'] = $cvName;


        Candidate::create($data);
        // dd($data);
        $user = User::findorfail(Auth::id());
        $user['role']="candidate";
        $user->save();
        return to_route('jobPosts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,Candidate $candidate ,Technology $technology )
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
        $technology = Technology::all();
        return view('candidate.show' ,compact('candidate' ,'technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request , Candidate $candidate)
    {
        if ($request->user()->cannot('update',$candidate)){
            abort(401);
        }
        return view('candidate.edit' , compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        if ($request->hasFile("cv")){
            $cv = $request->file("cv");
            $cvName = $cv->store("Cv","user_image");
        }
        $data = $request->all();
        if (isset($cvName)){
            $data['cv'] = $cvName;
        }
        $candidate->update($data);
        return redirect()->route('candidate.show', $candidate);
        // return redirect()->route('candidateDashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
