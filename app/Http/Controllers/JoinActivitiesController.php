<?php

namespace App\Http\Controllers;

use App\JoinActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinActivitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//    admin join activities
    public function getJoinActivities() {
        $join_activities = JoinActivities::orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.join_activities.join_activities',compact('join_activities'));
    }

    public function getCreateJoinActivities() {
        $count_user = JoinActivities::count();
        return view('admin.join_activities.join_activities',[
            'count_user'=>$count_user,
        ]);
    }

    public function postCreateJoinActivities(Request $request) {
        $join_activities = new JoinActivities();
        $join_activities->name = $request->get('name');

        $join_activities->save();
        return redirect('admin/join_activities');
    }

    public function postEditJoinActivities(Request $request) {
        $join_activities = JoinActivities::find($request->get('id'));
        $join_activities->status_id = $request->get('status_id');
        $join_activities->save();
        return redirect()->back();
    }

    public function getEditJoinActivities($id) {
        $join_activity = JoinActivities::find($id);
        return view('admin.join_activities.edit_join_activities',[
            'join_activity'=>$join_activity
        ]);
    }

    public function postDeleteJoinActivities(Request $request) {
        $join_activity = JoinActivities::find($request->get('id'));
//        dd($activity->id);
        $join_activity -> delete();
        return redirect()->back();
    }
}
