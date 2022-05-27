<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Models\Department;
use Illuminate\Http\Request;

class LearningController extends Controller
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
        $ls = Learning::all();
        return view('learning.index', compact('ls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$learning = Learning::all();
        //dd($learning);
        $depts = Department::all();
        return view('learning.create', compact('depts'));
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
            'department_id' => ['required', 'string'],
            'taskNo' => ['required', 'string'],
            'task' => ['required', 'string'],
            'code' => ['required', 'string'],
            'link' => ['required', 'string'],

        ]);

        $l = new Learning();

        $l->department_id = $request->department_id;
        $l->taskNo = $request->taskNo;
        $l->task = $request->task;
        $l->code = $request->code;
        $l->link = $request->link;
        $l->save();

        return redirect(route('learning.index'))->with('yes','learning path Added with success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function show(Learning $learning)
    {
        //return view('learning.create',compact('learning'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function edit(Learning $learning)
    {
        return view('learning.create',compact('learning'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Learning $learning)
    {
        $learning->update([
            'department_id' => $request->department_id,
            'taskNo' => $request->taskNo,
            'task' => $request->task,
            'code' => $request->code,
            'link' => $request->link
        ]);

        return redirect(route('learning.index'))->with('yes','learning path updated with success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Learning $learning)
    {
        $learning->delete();
        return redirect(route('learning.index'))->with('yes','learning path deleted with success !!');
    }
}
