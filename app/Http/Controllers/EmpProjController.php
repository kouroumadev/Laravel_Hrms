<?php

namespace App\Http\Controllers;

use App\Models\EmpProj;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class EmpProjController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empProjs = EmpProj::all();
        //dd($empProjs);
        return view('empProj.index', compact('empProjs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $projects = Project::all();

        return view('empProj.create',compact('users','projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'project_id' => ['required'],

        ]);

        $empP = new EmpProj();
        $empP->user_id = $request->user_id;
        $empP->project_id = $request->project_id;

        $empP->save();

        return redirect(route('empProj.index'))->with('yes',' Added with success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpProj  $empProj
     * @return \Illuminate\Http\Response
     */
    public function show(EmpProj $empProj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpProj  $empProj
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpProj $empProj)
    {
        return view('empProj.create', compact('empProj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpProj  $empProj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpProj $empProj)
    {
        $empProj->update([
            'user_id' => $request->user_id,
            'project_id' => $request->project_id
        ]);

        return redirect(route('empProj.index'))->with('yes',' updated with success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpProj  $empProj
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpProj $empProj)
    {
        $empProj->delete();
        return redirect(route('empProj.index'))->with('yes',' deleted with success !!');
    }
}
