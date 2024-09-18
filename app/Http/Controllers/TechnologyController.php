<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Http\Request;
class TechnologyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologys = Technology::paginate(3);
        return view("skills.index",compact('technologys') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        Technology::create($request->all());
        return redirect()->route('skills.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id , Request $request)
    {
        // dd($request->all());
        $technology = Technology::findOrFail($id);  // returns the technology model object
        return view("skills.show" , compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology ,$id)
    {
        $technology = Technology::findOrFail($id);
        return view('skills.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, $id)
    {
        $technology = Technology::findOrFail($id);
        $technology->update($request->all());
        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology ,$id)
    {
        // dd($technology);
        $technology = Technology::findOrFail($id);
        $technology->delete();
        return redirect()->route('skills.index');
    }
}
