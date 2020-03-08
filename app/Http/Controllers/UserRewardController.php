<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Rewards;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserRewardController extends Controller
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
        $contents_1 = Rewards::orderBy('updated_at','DESC')->limit(4)->get();
        $contents_2 = Rewards::orderBy('created_at','DESC')->limit(4)->get();
        $contents_3 = Rewards::orderBy('point','ASC')->orderBy('updated_at','DESC')->limit(4)->get();
        $rewards = Rewards::orderBy('created_at','DESC')->limit(1)->get();
        $rewards2 = Rewards::orderBy('created_at','DESC')->limit(4)->get();


        return view('user.reward',[
            'contents_1'=>$contents_1,
            'contents_2'=>$contents_2,
            'contents_3'=>$contents_3,
            'rewards'=>$rewards,
            'rewards2'=>$rewards2,
            'today'=>$today,
        ]);
    }
    public function getRewardNewsDetail(Request $request, $filter){
        $rewards = Rewards::all();
        if ($filter == 'latest'){
            $header = 'ของรางวัลล่าสุด';
            $rewards = Rewards::orderBy('updated_at','DESC')->paginate(4);
        }
        elseif ($filter == 'popular'){
            $header = 'ของรางวัลยอดนิยม';
            $rewards = Rewards::orderBy('point','DESC')->orderBy('updated_at','DESC')->paginate(4);
        }
        elseif ($filter == 'lesspoints'){
            $header = 'ของรางวัลที่ใช้แต้มน้อยที่สุด';
            $rewards = Rewards::orderBy('point','ASC')->orderBy('updated_at','DESC')->paginate(4);
        }
        return view('user.reward_news_detail',compact('rewards','header'));
    }
}
