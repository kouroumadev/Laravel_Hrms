<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'phone' => ['required', 'string', 'min:3'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'user_type' => ['required','string'],
            'image' => ['image'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
            //dd($data);

            $request = app('request');
            //dd($request->all());

            $filename = $request->file('image')->getClientOriginalName();

            $request->image->storeAs('images', $filename, 'public');

            return User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'name' => $data['name'],
                'gender' => $data['gender'],
                'street' => $data['street'],
                'city' => $data['city'],
                'country' => $data['country'],
                'user_type' => $data['user_type'],
                'date_b' => $data['date_b'],
                'date_j' => $data['date_j'],
                'department_id' => $data['department_id'],
                'image' => $filename,
            ]);

    }
}
