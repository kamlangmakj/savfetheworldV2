<?php

namespace App\Http\Controllers;

use App\Activities;
use App\JoinActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//    admin activities
    public function getActivities() {
        $activities = Activities::paginate(5);
        return view('admin.activities.activities',compact('activities'));
    }

    public function getCreateActivities() {
        $count_user = JoinActivities::count();
        return view('admin.activities.create_activities',[
            'count_user'=>$count_user,
        ]);
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

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
            $activities->image = $request->file('image')->move('uploads/activities',$fileNameToStore);
        }
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
}
