<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Department;
use App\Models\User;
use App\Models\Learning;
use App\Models\EmpProj;
use App\Models\Project;
use App\Models\Workflow;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');

        if(Auth::check()) {
            if(auth()->user()->user_type == 'Admin')
            {

                $admin = DB::table('users')->where('user_type','Admin')->count();
                $intern = DB::table('users')->where('user_type','Intern')->count();
                $depts = Department::all()->count();
                $ls = Learning::all()->count();
                $emP = EmpProj::all()->count();
                $works = Workflow::all()->count();
                $projs = Project::all()->count();

                return view('home', compact('admin','intern','depts','ls','emP','works','projs'));

            } else {

                $deb_date = Carbon::parse(auth()->user()->date_j)->format('d-m-Y');
                $fin_date = Carbon::parse(auth()->user()->date_j)->addMonths(4)->format('d-m-Y');

                $start_date = Carbon::parse(auth()->user()->date_j);
                $today_date = Carbon::now();
                $end_date = Carbon::parse(auth()->user()->date_j)->addMonths(4);
                $final_date = $today_date->diffInDays($end_date);

                //$current = Carbon::createFromFormat('Y-m-d',auth()->user()->date_j)->format('d-m-Y');

                return view('intern', compact('deb_date','final_date','fin_date'));
            }
            //$current = Carbon::now()->addMonths(5);
            //$current = Carbon::createFromFormat('Y-m-d',auth()->user()->date_j)->format('d-m-Y');

            //$rooms = auth()->user()->rooms->count();
            //$students = auth()->user()->students->count();
            //return view('home', compact('rooms','students'));

        } else {
            return view('auth.login');
        }

    }

    public function workflow()
    {
        return view('workflow.index');
    }

}
