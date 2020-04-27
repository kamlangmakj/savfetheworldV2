<?php

namespace App\Http\Controllers;

use App\Activities;
use App\JoinActivities;
use App\SaveActivities;
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



    public function getConfirmJoin($id)
    {
        $join_activity = JoinActivities::find($id);
        return view('user.confirm_join', [
            'join_activity' => $join_activity
        ]);
    }

    public function getRewardsHistory()
    {
        $users = DB::table('users');
        $tracking_rewards = TrackingRewards::where('users_id', Auth::user()->id)->orderBy('status_id', 'ASC')->orderBy('updated_at','DESC')->paginate(5);
        return view('user.get_rewards_history', compact('users', 'tracking_rewards'));
    }

    public function postDeleteRewardsHistory(Request $request)
    {
        $tracking_reward = TrackingRewards::find($request->get('tracking_rewards_id'));
//        dd($tracking_reward);
        $user = Users::find(Auth::user()->id);
        $user->point = $user->point + $tracking_reward->reward->point;
        $user->save();
//        dd($tracking_reward->id);
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
        $join_activities = JoinActivities::where('users_id', Auth::user()->id)->orderBy('status_id', 'ASC')->orderBy('updated_at','DESC')->paginate(5);
        return view('user.join_activities_history', compact('users', 'join_activities'));
    }

    public function postDeletejoinActivitiesHistory(Request $request)
    {
        $join_activity = JoinActivities::find($request->get('join_activities_id'));
        $user = Users::find(Auth::user()->id);

        if ($join_activity->status_id == 2) {
            $user = Users::find(Auth::user()->id);
            $user->point = $user->point + $join_activity->activity->point;
            $user->save();

            $join_activity->status_id = 3;
            $join_activity->save();
            return redirect()->back();
        }else {
            $join_activity->delete();
            $user->save();
            return redirect()->back();
        }

    }

    public function postEditProfileUser(Request $request)
    {
//        return $request->all();
        $users = Users::find($request->get('id'));
        $users->name = $request->get('name');
//        $users->email = $request->get('email');
        $users->address = $request->get('address');
        $users->geography_id = $request->get('geography_id');
        $users->province_id = $request->get('province_id');
        $users->gender = $request->get('gender');
        $users->phone = $request->get('phone');

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis') . '_' . $fileName . '.' . $extension;
            $users->image = $request->file('image')->move('uploads/users', $fileNameToStore);
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

    public function getSaveRewardsHistory()
    {
        $users = DB::table('users');
        $tracking_rewards = TrackingRewards::where('users_id', Auth::user()->id)->orderBy('updated_at','DESC')->paginate(5);
        return view('user.save_rewards_history', compact('users', 'tracking_rewards'));
    }

    public function postDeleteSaveRewardsHistory(Request $request)
    {
        $tracking_reward = TrackingRewards::find($request->get('tracking_rewards_id'));
//        dd($tracking_reward);
        $user = Users::find(Auth::user()->id);
        $user->point = $user->point + $tracking_reward->reward->point;
        $user->save();
//        dd($tracking_reward->id);
        if ($tracking_reward->delete()) {
            $tracking_reward->reward->quantity = $tracking_reward->reward->quantity + 1;
            $tracking_reward->reward->save();
        }
        $tracking_reward->delete();
        return redirect()->back();
    }

    public function getSaveActivitiesHistory()
    {
        $users = DB::table('users');
        $join_activities = JoinActivities::where('users_id', Auth::user()->id)->orderBy('status_id', 'ASC')->orderBy('updated_at','DESC')->paginate(5);
        return view('user.save_activities_history', compact('users', 'join_activities'));
    }

    public function postRewards(Request $request)
    {
        $reward = Rewards::find($request->get('rewards_id'));
        $reward->trackingRewards()->attach(Auth::user());
        $user = Users::find(Auth::user()->id);
        $user->point = $user->point - $reward->point;
        $reward->quantity = $reward->quantity - 1;
        $reward = new TrackingRewards;
        $reward -> address = $request->get('address');
        $reward -> rewards_id = $request->get('rewards_id');
        $reward -> users_id = Auth::user()->id;
        $user->save();
        $reward->save();
        return redirect()->back();
    }

//    public function postSaveActivities(Request $request)
//    {
//        $save_activities = SaveActivities::find($request->get('save_activities_id'));
//        $save_activities->trackingRewards()->attach(Auth::user());
//        $save_activities->save();
//        return redirect()->back();
//    }



//    public function postSaveActivities(Request $request, $id)
//    {
//        $save_activities = SaveActivities::where('users_id', Auth::user()->id)->
//        where('activities_id', $id)->first();
//
//        $activity = Activities::find($request->get('activities_id', $id));
//        if ($save_activities) {
//            $activity->saveActivities()->detach(Auth::user());
//        } else {
//            $activity->saveActivities()->attach(Auth::user());
//        }
//        return redirect()->back();
//    }

    public function postDeleteSaveActivitiesHistory(Request $request)
    {
        $save_activity = SaveActivities::find($request->get('$save_activity_id'));
        $user = Users::find(Auth::user()->id);
        $user->save();
        $save_activity->delete();
        return redirect()->back();
    }

    public function postEditRewardsHistory(Request $request)
    {
        $tracking_rewards = TrackingRewards::find($request->get('id'));
        $tracking_rewards->address = $request->get('address');
        $tracking_rewards->save();
        return redirect()->back();
    }

    public function getEditRewardsHistory($id)
    {
        $tracking_reward = TrackingRewards::find($id);
        return view('user.edit_get_rewards_history', [
            'tracking_reward' => $tracking_reward
        ]);
    }



}
