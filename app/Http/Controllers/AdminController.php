<?php

namespace App\Http\Controllers;

use App\TrackingRewards;
use App\Users;
use App\Rewards;
use App\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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
//        $tracking_rewards = DB::table('tracking_rewards');
        $tracking_rewards = TrackingRewards::all();


        return view('admin.index',[
            'users'=>$users,
            'activities'=>$activities,
            'rewards'=>$rewards,
            'tracking_rewards'=>$tracking_rewards,
        ]);
    }
}
