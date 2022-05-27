<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        $depts = Department::all();
        return view('department.index', compact('depts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'dept_name' => ['required', 'string', 'unique:departments'],
            'dept_desc' => ['required', 'string'],
            'dept_head' => ['required', 'string'],

        ]);

        $dept = new Department();

        $dept->dept_name = $request->dept_name;
        $dept->dept_desc = $request->dept_desc;
        $dept->dept_head = $request->dept_head;
        $dept->save();

        return redirect(route('department.index'))->with('yes','Departement Added with success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department.create', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->update([
            'dept_name' => $request->dept_name,
            'dept_desc' => $request->dept_desc,
            'dept_head'  => $request->dept_head
        ]);
        return redirect(route('department.index'))->with('yes','Departement Added with success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect(route('department.index'))->with('yes','Departement Deleted with success !!');
    }

    public function showAll()
    {
        $users = User::all();
        $depts = Department::all();
        return view('department.showAll', compact('users','depts'));
    }
}
