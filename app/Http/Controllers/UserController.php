<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('auth.index', compact('users'));
    }

    public function edit() {
        $user = auth()->user();

        return view('auth.edit', compact('user'));

    }

    public function show() {
        $user = auth()->user();
        return view('auth.show', compact('user'));
    }

    public function update(Request $request, User $user) {

        /*dd($request->all());*/

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string']
        ]);

        //dd($request->all());

        if($request->hasFile('image')) {

            Storage::delete('/public/images/' . $user->image);
            $filename = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
        } else {
            $filename = $request['himage'];
        }


        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'location' => $request->location,
            'image' => $filename,
        ]);

        return redirect(route('user.show'))->with('yes','Detais updated with success');


    }


}
