<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
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
        $rooms = auth()->user()->rooms;
        return view('attendance.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $studs = Student::where('room_id', $id)->get();
        $student = Student::where('room_id', $id)->first();

        return view('attendance.create',compact('studs', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->room_id);
        foreach ($request->non as $val) {
            $att = new attendance();

            if(in_array($val, $request->oui)) {
                $att->user_id = auth()->user()->id;
                $att->room_id = $request->room_id;
                $att->student_id = $val;
                $att->date = $request->date;
                $att->flag = 1;
                $att->save();

            } else {
                $att->user_id = auth()->user()->id;
                $att->room_id = $request->room_id;
                $att->student_id = $val;
                $att->date = $request->date;
                $att->flag = 0;
                $att->save();
            }
        }

        return redirect()->route('attendance.showAll');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function filter(Request $request) {

        $studs = Student::where('room_id', $request->sub)->get();
        //$student = Student::where('room_id', $request->sub)->first();
        //dd($studs);*/

        if(!$studs->isEmpty()) {
            return redirect()->route('attendance.create', ['id' => $request->sub ]);
            //return view('attendance.create', compact('studs','student'));
        } else {
            return redirect(route('attendance.index'))->with('no','no students under this subject!');
        }

    }

    public function showAll() {
        //dd('yes');
        $rooms = auth()->user()->rooms;
        $atts = auth()->user()->attendances->paginate(3);

        return view('attendance.showAll', compact('rooms', 'atts'));
    }

    public function showBy() {

         $rooms = auth()->user()->rooms;
        return view('attendance.showBy', compact('rooms'));
    }

    public function overAll(Request $request) {
        $atts = Attendance::where('room_id', $request->sub)->get();
        //dd($rooms);
        if($atts->isEmpty()){
            return redirect()->back()->with('no','no Students under this subject, please choose another subject');
        } elseif ($request->deb > $request->fin) {
            return redirect()->back()->with('no','dates non valid');
        } else {
            $debut = $request->deb;
            $fin = $request->fin;

            $reps = DB::table('attendances')->groupBy('student_id')
                        ->where('room_id',$request->sub)
                        ->WhereBetween('date', [$request->deb, $request->fin])
                        ->selectRaw("sum(flag) as flags, student_id")->get();
                        //dd($reps);
                        $request->session()->put('reps', $reps);
                        $request->session()->put('debut', $debut);
                        $request->session()->put('fin', $fin);
                        $request->session()->put('roid', $request->sub);

            //return view('attendance.result',compact('reps','debut','fin'));
            return redirect()->route('attendance.result');
                //->with('reps', $reps)
                //->with('debut', $debut)
                //->with('fin', $fin) ;

        }
    }
    public function result() {
        $reps = session()->get('reps');
        $debut = session()->get('debut');
        $fin = session()->get('fin');

        $room = Room::find(session()->get('roid'));

        //dd($room);

        return view('attendance.result', compact('reps','debut','fin','room'));
    }

}
