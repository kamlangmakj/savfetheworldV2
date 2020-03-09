<?php

namespace App\Http\Controllers;

use App\JoinActivities;
use App\Activities;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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
        $contents_1 = Activities::whereDay('expired_date', '=', date('d'))->where('point','>=',10000)->orderBy('started_date','ASC')->limit(4)->get();
//        $contents_1 = Activities::orderBy('expired_date','DESC')->limit(4)->get();
        $contents_2 = Activities::orderBy('created_at','DESC')->limit(4)->get();
        $contents_3 = Activities::orderBy('point','DESC')->orderBy('updated_at','DESC')->limit(4)->get();
        $contents_4 = Activities::orderBy('point','DESC')->orderBy('updated_at','DESC')->limit(4)->get();
        $activities = Activities::orderBy('created_at','DESC')->limit(4)->get();

        $slides1 = Activities::orderBy('updated_at','DESC')->limit(5)->get();



//        $test = Activities::where('column', 'value')->count();


        return view('user.activity',[
            'contents_1'=>$contents_1,
            'contents_2'=>$contents_2,
            'contents_3'=>$contents_3,
            'contents_4'=>$contents_4,
            'activities'=>$activities,
            'today'=>$today,
            'slides1'=>$slides1,

        ]);
    }
    public function getActivityNewsDetail(Request $request, $filter){
        $activities = Activities::all();
        if ($filter == 'latest'){
            $header = 'กิจกรรมล่าสุด';
            $activities = Activities::orderBy('updated_at','DESC')->paginate(4);
        }
        elseif ($filter == 'popular'){
            $header = 'กิจกรรมยอดนิยม';
            $activities = Activities::orderBy('point','DESC')->orderBy('updated_at','DESC')->paginate(4);
        }
        elseif ($filter == 'mostpoints'){
            $header = 'กิจกรรมที่มีแต้มสะสมมากที่สุด';
            $activities = Activities::orderBy('point','DESC')->orderBy('updated_at','DESC')->paginate(4);
        }
        return view('user.activity_news_detail',compact('activities','header'));
    }
}
