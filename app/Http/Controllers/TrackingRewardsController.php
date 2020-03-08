<?php

namespace App\Http\Controllers;

use App\Rewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingRewardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //    admin tracking_rewards
    public function getTrackingRewards()
    {
        $tracking_rewards = DB::table('tracking_rewards')->paginate(5);
        return view('admin.tracking_rewards.tracking_rewards',compact('tracking_rewards'));
    }


}
