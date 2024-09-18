<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateTechnologyRequest;
use App\Http\Requests\UpdateCandidateTechnologyRequest;
use App\Models\CandidateTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;


class CandidateTechnologyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_candidate');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(StoreCandidateTechnologyRequest $request)
    {
        $data =  $request->all();
        $user = Auth::id();
        $candidate = Candidate::where('user_id', $user)->first();
        $data['candidate_id'] = $candidate->id;
            foreach ($request->technology_id as $key => $value) {

                unset($data["technology_id"]);

                $data = $data + ["technology_id" => $value];

                CandidateTechnology::create($data);
              }
              return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CandidateTechnology $candidateTechnology)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CandidateTechnology $candidateTechnology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateTechnologyRequest $request, CandidateTechnology $candidateTechnology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CandidateTechnology $candidateTechnology)
    {
         $candidateTechnology->delete();
         return redirect()->back();
    }
}
