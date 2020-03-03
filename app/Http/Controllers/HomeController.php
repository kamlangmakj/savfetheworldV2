<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users');
        $activities = DB::table('activities');
        $rewards = DB::table('rewards');
        $tracking_rewards = DB::table('tracking_rewards');
//        $activities = Activities::all();
//        $rewards = Rewards::all();
        return view('user.index',[
            'users'=>$users,
            'activities'=>$activities,
            'rewards'=>$rewards,
            'tracking_rewards'=>$tracking_rewards,
        ]);
    }
}
