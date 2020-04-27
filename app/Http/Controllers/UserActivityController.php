<?php

namespace App\Http\Controllers;

use App\Activities;
use App\JoinActivities;
use App\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserActivityController extends Controller
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
        $today = Carbon::today()->addYear(543)->translatedFormat('d M Y');
        $contents_1 = Activities::whereDay('expired_date', '=', date('d'))->where('point', '>=', 10000)->orderBy('started_date', 'ASC')->limit(4)->get();
//        $contents_1 = Activities::orderBy('expired_date','DESC')->limit(4)->get();
        $contents_2 = Activities::orderBy('created_at', 'DESC')->limit(4)->get();
        $contents_3 = Activities::orderBy('amount', 'DESC')->orderBy('updated_at', 'DESC')->limit(4)->get();
        $contents_4 = Activities::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->limit(4)->get();
        $activities = Activities::orderBy('created_at', 'DESC')->limit(4)->get();

        $contents_2_2 = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '<=', 10)->limit(4)->get();
        $contents_3_2 = Activities::orderBy('amount', 'DESC')->where('category_types_activities_id', '<=', 10)->orderBy('updated_at', 'DESC')->limit(4)->get();
        $contents_4_2 = Activities::orderBy('point', 'DESC')->where('category_types_activities_id', '<=', 10)->orderBy('updated_at', 'DESC')->limit(4)->get();

        $contents_2_3 = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->limit(4)->get();
        $contents_3_3 = Activities::orderBy('amount', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->limit(4)->get();
        $contents_4_3 = Activities::orderBy('point', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->limit(4)->get();

        $contents_2_4 = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '>=', 17)->limit(4)->get();
        $contents_3_4 = Activities::orderBy('amount', 'DESC')->where('category_types_activities_id', '>=', 17)->orderBy('updated_at', 'DESC')->limit(4)->get();
        $contents_4_4 = Activities::orderBy('point', 'DESC')->where('category_types_activities_id', '>=', 17)->orderBy('updated_at', 'DESC')->limit(4)->get();




        $slides1 = Activities::orderBy('updated_at', 'DESC')->limit(5)->get();


//        $test = Activities::where('column', 'value')->count();


        return view('user.activity', [
            'contents_1' => $contents_1,
            'contents_2' => $contents_2,
            'contents_3' => $contents_3,
            'contents_4' => $contents_4,
            'activities' => $activities,
            'contents_2_2' => $contents_2_2,
            'contents_3_2' => $contents_3_2,
            'contents_4_2' => $contents_4_2,
            'contents_2_3' => $contents_2_3,
            'contents_3_3' => $contents_3_3,
            'contents_4_3' => $contents_4_3,
            'contents_2_4' => $contents_2_4,
            'contents_3_4' => $contents_3_4,
            'contents_4_4' => $contents_4_4,
            'today' => $today,
            'slides1' => $slides1,

        ]);
    }

    public function getActivityDetail($id)
    {
        if (Auth::guest()) {
            $activity = Activities::find($id);
            $contents_2 = Activities::orderBy('created_at', 'DESC')->limit(4)->get();
            return view('user.activity_detail', [
                'activity' => $activity,
                'contents_2' => $contents_2,
            ]);

        } else {
            $activity = Activities::find($id);
            $contents_2 = Activities::orderBy('created_at', 'DESC')->limit(4)->get();
            $join_activities = JoinActivities::where('users_id', Auth::user()->id)->
            where('activities_id', $id)->first();
            $isJoin = $join_activities != null;
            return view('user.activity_detail', [
                'activity' => $activity,
                'isJoin' => $isJoin,
                'contents_2' => $contents_2,
            ]);
        }
        $activity = Activities::find($id);
        $contents_2 = Activities::orderBy('created_at', 'DESC')->limit(4)->get();
        return view('user.activity_detail', [
            'activity' => $activity,
            'contents_2' => $contents_2,
        ]);
    }

    public function getActivityNewsDetail(Request $request, $filter)
    {
        $activities = Activities::all();
        if ($filter == 'latest') {
            $header = 'กิจกรรมล่าสุด';
            $activities = Activities::orderBy('updated_at', 'DESC')->paginate(4);
        } elseif ($filter == 'popular') {
            $header = 'กิจกรรมยอดนิยม';
            $activities = Activities::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->paginate(4);
        } elseif ($filter == 'mostpoints') {
            $header = 'กิจกรรมที่มีแต้มสะสมมากที่สุด';
            $activities = Activities::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->paginate(4);
        }
        elseif ($filter == 'forest-latest') {
            $header = 'หมวดหมู่ป่าไม้ - กิจกรรมล่าสุด';
            $activities = Activities::orderBy('updated_at', 'DESC')->where('category_types_activities_id', '<=', 10)->paginate(4);
        }
        elseif ($filter == 'forest-popular') {
            $header = 'หมวดหมู่ป่าไม้ - กิจกรรมยอดนิยม';
            $activities = Activities::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->where('category_types_activities_id', '<=', 10)->paginate(4);
        }
        elseif ($filter == 'forest-mostpoints') {
            $header = 'หมวดหมู่ป่าไม้ - กิจกรรมที่มีแต้มสะสมมากที่สุด';
            $activities = Activities::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->where('category_types_activities_id', '<=', 10)->paginate(4);
        }
        elseif ($filter == 'sea-latest') {
            $header = 'หมวดหมู่ทะเล - กิจกรรมล่าสุด';
            $activities = Activities::orderBy('updated_at', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->paginate(4);
        }
        elseif ($filter == 'sea-popular') {
            $header = 'หมวดหมู่ทะเล - กิจกรรมยอดนิยม';
            $activities = Activities::orderBy('point', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->paginate(4);
        }
        elseif ($filter == 'sea-mostpoints') {
            $header = 'หมวดหมู่ทะเล - กิจกรรมที่มีแต้มสะสมมากที่สุด';
            $activities = Activities::orderBy('point', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->paginate(4);
        }
        elseif ($filter == 'country-latest') {
            $header = 'หมวดหมู่ชุมชน - กิจกรรมล่าสุด';
            $activities = Activities::orderBy('updated_at', 'DESC')->where('category_types_activities_id', '>=', 17)->paginate(4);
        }
        elseif ($filter == 'country-popular') {
            $header = 'หมวดหมู่ชุมชน - กิจกรรมยอดนิยม';
            $activities = Activities::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->where('category_types_activities_id', '>=', 17)->paginate(4);
        }
        elseif ($filter == 'country-mostpoints') {
            $header = 'หมวดหมู่ชุมชน - กิจกรรมที่มีแต้มสะสมมากที่สุด';
            $activities = Activities::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->where('category_types_activities_id', '>=', 17)->paginate(4);
        }
        return view('user.activity_news_detail', compact('activities', 'header'));
    }

    public function postActivities(Request $request, $id)
    {
        $join_activities = JoinActivities::where('users_id', Auth::user()->id)->
        where('activities_id', $id)->first();

        $activity = Activities::find($request->get('activities_id', $id));
        if ($join_activities) {
            $activity->joinActivities()->detach(Auth::user());
        } else {
            $activity->joinActivities()->attach(Auth::user());
        }
//        $user = Users::find(Auth::user()->id);
//        $user->save();
        return redirect()->back();
    }
}
