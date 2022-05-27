<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
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
        $studs = auth()->user()->students->paginate(2);
        $rooms = auth()->user()->rooms;
        //$studs = Student::paginate(2);

        return view('student.index', compact('studs','rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = auth()->user()->rooms;
        return view('student.create', compact('rooms'));
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
            'regno' => ['required', 'string', 'unique:students'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255', 'unique:students'],
            'tel' => ['required', 'unique:students'],
            'image' => ['image'],
        ]);

        if($request->has('image')) {
            //dd(auth()->user()->id);
            $filename = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
        } else {
            //dd('no');
            $filename = "";
        }

        $stud = new Student();

        $stud->user_id = auth()->user()->id;
        $stud->room_id = $request->sub;
        $stud->regno = $request->regno;
        $stud->name = $request->name;
        $stud->email = $request->email;
        $stud->tel = $request->tel;
        $stud->image = $filename;

        $stud->save();

        return redirect(route('student.create'))->with('yes','Student Added with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $rooms = auth()->user()->rooms;
        return view('student.edit', compact('student', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        if($request->has('image')) {
            Storage::delete('/public/images/' . $student->image);
            $filename = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
        } else {
            $filename = $request->image;
        }

        $student->update([
            'room_id' => $request->sub,
            'regno' => $request->regno,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'image' => $filename,

        ]);

        return redirect(route('student.index'))->with('yes', 'student updated with success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        if($student->image != null) {
            Storage::delete('/public/images/' . $student->image);
        }

        return redirect(route('student.index'))->with('yes', 'student deleted with success');
    }

    public function search(Request $request) {
        //$student = DB::table('students')->where('regno',$request->val)->first();
        $student = Student::where('regno',$request->val)->first();

        //dd($student);
        if($student != null) {
            return view('student.show', compact('student'));
        } else {
            return redirect(route('student.index'))->with('no','Record not found !');
        }
    }

    public function filter(Request $request) {

        $students = Student::where('room_id', $request->sub);
        $rooms = auth()->user()->rooms;
        if($students != null) {
            $studs = $students->paginate(2);
            return view('student.index', compact('studs','rooms'));

        } else {
            return redirect()->route('student.index', [
                'rooms' => $rooms,
                'no' => 'Records not found'
            ]);
        }
    }
}
