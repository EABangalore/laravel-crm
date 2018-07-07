<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

           $data = [];

            $newJobCount = \App\new_job::where('job_completed',0)->where('seen',0)->count();     

            $data['new_job'] = $newJobCount;

            $completedJob = \App\new_job::where('job_completed',1)->count(); 

            $data['completed_job'] = $completedJob;

            return view('dashboard',['data'=>$data]);
       // return view('dashboard');
    }
}
