<?php

namespace App\Http\Controllers;

use App\Activities;
use App\JoinActivities;
use App\TrackingRewards;
use App\Users;
use App\Rewards;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //    user profile
    public function getProfileUser()
    {
        $users = DB::table('users');
        $tracking_rewards = TrackingRewards::where('users_id', Auth::user()->id)->get();
        return view('user.profile', compact('users', 'tracking_rewards'));
    }

    public function getRewardsHistory()
    {
        $users = DB::table('users');
        $tracking_rewards = TrackingRewards::where('users_id', Auth::user()->id)->orderBy('id','DESC')->paginate(5);
        return view('user.get_rewards_history', compact('users', 'tracking_rewards'));
    }

    public function postDeleteRewardsHistory(Request $request)
    {
        $tracking_reward = TrackingRewards::find($request->get('tracking_rewards_id'));
//        dd($tracking_reward);
        $user = Users::find(Auth::user()->id);
        $user->point = $user->point + $tracking_reward->reward->point;
        $user->save();
        dd($tracking_reward->id);
        if ($tracking_reward->delete()) {
            $tracking_reward->reward->quantity = $tracking_reward->reward->quantity + 1;
            $tracking_reward->reward->save();
        }
        $tracking_reward->delete();
        return redirect()->back();
    }

    public function joinActivitiesHistory()
    {
        $users = DB::table('users');
        $join_activities = JoinActivities::where('users_id', Auth::user()->id)->paginate(5);
        return view('user.join_activities_history', compact('users', 'join_activities'));
    }

    public function postDeletejoinActivitiesHistory(Request $request)
    {
        $join_activity = JoinActivities::find($request->get('join_activities_id'));
//        dd($join_activity->id);
        $user = Users::find(Auth::user()->id);
        $user->save();
        $join_activity->delete();
        return redirect()->back();
    }

    public function postEditProfileUser(Request $request)
    {
//        return $request->all();
        $users = Users::find($request->get('id'));
        $users->name = $request->get('name');
//        $users->email = $request->get('email');
        $users->gender = $request->get('gender');
        $users->phone = $request->get('phone');

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis') . '_' . $fileName . '.' . $extension;
            $users->image = $request->file('image')->move('uploads/activities', $fileNameToStore);
        }
        $users->save();
        return redirect()->back();
    }

    public function getEditProfileUser($id)
    {
        $user = Users::find($id);
        return view('user.profile_edit', [
            'user' => $user
        ]);
    }


}
