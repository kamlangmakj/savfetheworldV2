<?php

namespace App\Http\Controllers;

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
        return view('admin.index');
    }

    public function tracking_rewards()
    {
        return view('admin.tracking_rewards.tracking_rewards');
    }

//    admin users
    public function getUsers() {
        $users = DB::table('users')->paginate(5);
        return view('admin.users.users',compact('users'));
    }

    public function postEditUsers(Request $request) {
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
//        return $request->all();
        $users = Users::find($request->get('id'));
        $users->name = $request->get('name');
//        $users->email = $request->get('email');
        $users->gender = $request->get('gender');
        $users->phone = $request->get('phone');
        $users->image = $request->file('image')->move('uploads/users',$fileNameToStore);
        $users->save();
        return redirect()->back();
    }

    public function getEditUsers($id) {
        $user = Users::find($id);
        return view('admin.users.edit_users',[
            'user'=>$user
        ]);
    }

    public function postDeleteUsers(Request $request) {
        $user = Users::find($request->get('id'));
        $user -> delete();
        return redirect()->back();
    }

//    admin activities
    public function getActivities() {
        $activities = DB::table('activities')->paginate(5);
        return view('admin.activities.activities',compact('activities'));
    }

    public function getCreateActivities() {
        return view('admin.activities.create_activities');
    }

    public function postCreateActivities(Request $request) {
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
        $activities = new Activities();
        $activities->name = $request->get('name');
        $activities->agent = $request->get('agent');
        $activities->detail = $request->get('detail');
        $activities->address = $request->get('address');
//        $activities->category_types_activities_id = $request->get('category_types_activities_id');
//        $activities->province = $request->get('province');
        $activities->started_date = $request->get('started_date');
        $activities->expired_date = $request->get('expired_date');
        $activities->point = $request->get('point');
        $activities->amount = $request->get('amount');
        $activities->image = $request->file('image')->move('uploads/activities',$fileNameToStore);
        $activities->save();
        return redirect('admin/activities');
    }

    public function postEditActivities(Request $request) {
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
        $activities = Activities::find($request->get('id'));
        $activities->name = $request->get('name');
        $activities->agent = $request->get('agent');
        $activities->detail = $request->get('detail');
        $activities->address = $request->get('address');
//        $activities->category_types_activities_id = $request->get('category_types_activities_id');
//        $activities->province = $request->get('province');
        $activities->started_date = $request->get('started_date');
        $activities->expired_date = $request->get('expired_date');
        $activities->point = $request->get('point');
        $activities->amount = $request->get('amount');
        $activities->image = $request->file('image')->move('uploads/activities',$fileNameToStore);
        $activities->save();
        return redirect()->back();
    }

    public function getEditActivities($id) {
        $activity = Activities::find($id);
        return view('admin.activities.edit_activities',[
            'activity'=>$activity
        ]);
    }

    public function postDeleteActivities(Request $request) {
        $activity = Activities::find($request->get('id'));
        $activity -> delete();
        return redirect()->back();
    }


//    admin rewards
    public function getRewards() {
        $rewards = DB::table('rewards')->paginate(5);
        return view('admin.rewards.rewards',compact('rewards'));
    }

    public function getCreateRewards() {
        return view('admin.rewards.create_rewards');
    }

    public function postCreateRewards(Request $request) {
//        return $request->all();
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
        $rewards = new Rewards();
        $rewards->name = $request->get('name');
        $rewards->detail = $request->get('detail');
        $rewards->point = $request->get('point');
        $rewards->quantity = $request->get('quantity');
        $rewards->rewards_category_id = $request->get('rewards_category_id');
        $rewards->image = $request->file('image')->move('uploads/rewards',$fileNameToStore);
        $rewards->save();
        return redirect('admin/rewards');
    }

    public function postEditRewards(Request $request) {
//        return $request->all();
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
        $rewards = Rewards::find($request->get('id'));
        $rewards->name = $request->get('name');
        $rewards->detail = $request->get('detail');
        $rewards->point = $request->get('point');
        $rewards->quantity = $request->get('quantity');
        $rewards->rewards_category_id = $request->get('rewards_category_id');
        $rewards->image = $request->file('image')->move('uploads/rewards',$fileNameToStore);
        $rewards->save();
        return redirect()->back();
    }

    public function getEditRewards($id) {
        $reward = Rewards::find($id);
        return view('admin.rewards.edit_rewards',[
            'reward'=>$reward
        ]);
    }

    public function postDeleteRewards(Request $request) {
        $reward = Rewards::find($request->get('id'));
        $reward -> delete();
        return redirect()->back();
    }
}
