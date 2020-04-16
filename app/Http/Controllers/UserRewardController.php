<?php

namespace App\Http\Controllers;

use App\Rewards;
use App\TrackingRewards;
use App\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $contents = Rewards::orderBy('updated_at', 'DESC')->limit(3)->get();
        $contents_1 = Rewards::orderBy('updated_at', 'DESC')->limit(4)->get();
        $contents_2 = Rewards::orderBy('created_at', 'DESC')->limit(4)->get();
        $contents_3 = Rewards::orderBy('point', 'ASC')->orderBy('updated_at', 'DESC')->limit(4)->get();
        $rewards = Rewards::orderBy('created_at', 'DESC')->limit(1)->get();
        $rewards2 = Rewards::orderBy('created_at', 'DESC')->limit(4)->get();

        $slides1 = Rewards::where('quantity', '>', '0')->orderBy('point', 'ASC')->limit(5)->get();
//        $test = Activities::where('column', 'value')->count();


        return view('user.reward', [
            'contents' => $contents,
            'contents_1' => $contents_1,
            'contents_2' => $contents_2,
            'contents_3' => $contents_3,
            'rewards' => $rewards,
            'rewards2' => $rewards2,
            'today' => $today,
            'slides1' => $slides1,
        ]);
    }

    public function getRewardDetail($id)
    {
        $reward = Rewards::find($id);
        return view('user.reward_detail', [
            'reward' => $reward
        ]);
    }

    public function getRewardNewsDetail(Request $request, $filter)
    {
        $rewards = Rewards::all();
        if ($filter == 'latest') {
            $header = 'ของรางวัลล่าสุด';
            $rewards = Rewards::orderBy('updated_at', 'DESC')->paginate(4);
        } elseif ($filter == 'popular') {
            $header = 'ของรางวัลยอดนิยม';
            $rewards = Rewards::orderBy('point', 'DESC')->orderBy('updated_at', 'DESC')->paginate(4);
        } elseif ($filter == 'lesspoints') {
            $header = 'ของรางวัลที่ใช้แต้มน้อยที่สุด';
            $rewards = Rewards::orderBy('point', 'ASC')->orderBy('updated_at', 'DESC')->paginate(4);
        }
        return view('user.reward_news_detail', compact('rewards', 'header'));
    }

    public function postRewards(Request $request)
    {
        $reward = Rewards::find($request->get('rewards_id'));
//        dd($reward->id);
        $reward->trackingRewards()->attach(Auth::user());
//        $reward->trackingRewards()->attach(Auth::user());
        $user = Users::find(Auth::user()->id);
        $user->point = $user->point - $reward->point;
//        dd($reward->quantity);
        $reward->quantity = $reward->quantity - 1;
//        dd($reward->quantity);
        $user->save();
        $reward->save();
        return redirect()->back();
    }
}
