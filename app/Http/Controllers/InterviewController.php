<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $interviews = Interview::all();
       return view('interview.index', compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interview.create');
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
            'name' => ['required', 'string'],
            'date' => ['required', 'date'],
            'candidate' => ['required', 'string']
    ]);

        $interview = new Interview();

        $interview->name = $request->name;
        $interview->date = $request->date;
        $interview->candidate = $request->candidate;

        $interview->save();

        return redirect(route('interview.index'))->with('yes','added with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview)
    {
        return view('interview.show', compact('interview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit(Interview $interview)
    {
        return view('interview.create', compact('interview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
         $interview->update([
            'name' => $request->name,
            'date' => $request->date,
            'candidate' => $request->candidate
    ]);
            return redirect(route('interview.index'))->with('ye', 'updated with succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interview $interview)
    {
        $interview->delete();
        return redirect(route('interview.index'))->with('yes', 'deleted with succes');

    }
}
