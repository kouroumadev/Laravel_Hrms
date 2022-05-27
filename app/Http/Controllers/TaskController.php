<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workflow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
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
        //$works = Workflow::all();
        $works = DB::table('workflows')->select('*')
                        ->whereNotIn('id', function($query) {
                            $query->select('workflow_id')->from('tasks')
                                    ->where('user_id', auth()->user()->id);
                        })->get();
        return view('task.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    public function insert($id)
    {
        //dd($id);

        $date = Carbon::now();
        //dd($date->toDateString());

        $task = new Task();

        $task->workflow_id = $id;
        $task->user_id = auth()->user()->id;
        $task->date = $date->toDateString();

        $task->save();

            /*$works = auth()->user()->tasks;
            return view('task.done', compact('works'));*/

        return redirect(route('task.done'))->with('yes','marked with success !!');
    }

    public function done()
    {
        /*$workflows = DB::table('workflows')
            ->join('tasks', 'workflows.id', '!=', 'tasks.workflow_id')
            ->select('workflows.*')
            //->where('tasks.user_id', auth()->user()->id)
            ->get();

            $workflows = DB::table('workflows')->select('*')
                        ->where('id', function($query) {
                            $query->select('workflow_id')->from('tasks')
                                    ->where('user_id', auth()->user()->id);
                        })->get();*/

            //dd(auth()->user()->tasks);

            $works = auth()->user()->tasks;
            return view('task.done', compact('works'));
    }
}
