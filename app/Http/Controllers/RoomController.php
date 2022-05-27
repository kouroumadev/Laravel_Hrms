<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
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
        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $request->validate([
            'name' => ['required', 'string', 'unique:rooms'],

        ]);

        $ro = new Room();
        $ro->user_id = auth()->user()->id;
        $ro->name = $request->name;
        $ro->dept = $request->dept;
        $ro->sem = $request->sem;
        $ro->save();

        return redirect(route('room.index'))->with('yes','Subject Added wthit success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(room $room)
    {
        //dd($room);
        return view('room.create', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, room $room)
    {
        $room->update([
            'name' => $request->name,
            'dept' => $request->dept,
            'sem'  => $request->sem
        ]);

        return redirect(route('room.index'))->with('yes','Subject updated with success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(room $room)
    {
        //dd($room);
        $room->students()->delete();
        $room->delete();
        return redirect(route('room.index'))->with('yes','Subject Deleted with success!!');
    }
}
