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

        $contents_1_1 = Rewards::orderBy('updated_at', 'DESC')->where('rewards_category_id', '=', 1)->limit(4)->get();
        $contents_2_1 = Rewards::orderBy('created_at', 'DESC')->where('rewards_category_id', '=', 1)->limit(4)->get();
        $contents_3_1 = Rewards::orderBy('point', 'ASC')->where('rewards_category_id', '=', 1)->orderBy('updated_at', 'DESC')->limit(4)->get();

        $contents_1_2 = Rewards::orderBy('updated_at', 'DESC')->where('rewards_category_id', '=', 2)->limit(4)->get();
        $contents_2_2 = Rewards::orderBy('created_at', 'DESC')->where('rewards_category_id', '=', 2)->limit(4)->get();
        $contents_3_2 = Rewards::orderBy('point', 'ASC')->where('rewards_category_id', '=', 2)->orderBy('updated_at', 'DESC')->limit(4)->get();

        $contents_1_3 = Rewards::orderBy('updated_at', 'DESC')->where('rewards_category_id', '=', 3)->limit(4)->get();
        $contents_2_3 = Rewards::orderBy('created_at', 'DESC')->where('rewards_category_id', '=', 3)->limit(4)->get();
        $contents_3_3 = Rewards::orderBy('point', 'ASC')->where('rewards_category_id', '=', 3)->orderBy('updated_at', 'DESC')->limit(4)->get();

        $contents_1_4 = Rewards::orderBy('updated_at', 'DESC')->where('rewards_category_id', '=', 4)->limit(4)->get();
        $contents_2_4 = Rewards::orderBy('created_at', 'DESC')->where('rewards_category_id', '=', 4)->limit(4)->get();
        $contents_3_4 = Rewards::orderBy('point', 'ASC')->where('rewards_category_id', '=', 4)->orderBy('updated_at', 'DESC')->limit(4)->get();

        $contents_1_5 = Rewards::orderBy('updated_at', 'DESC')->where('rewards_category_id', '=', 5)->limit(4)->get();
        $contents_2_5 = Rewards::orderBy('created_at', 'DESC')->where('rewards_category_id', '=', 5)->limit(4)->get();
        $contents_3_5 = Rewards::orderBy('point', 'ASC')->where('rewards_category_id', '=', 5)->orderBy('updated_at', 'DESC')->limit(4)->get();


        $rewards = Rewards::orderBy('created_at', 'DESC')->limit(1)->get();
        $rewards2 = Rewards::orderBy('created_at', 'DESC')->limit(1)->get();
        $rewards3 = Rewards::orderBy('created_at', 'DESC')->limit(1)->get();

        $slides1 = Rewards::where('quantity', '>', '0')->orderBy('point', 'ASC')->limit(5)->get();
//        $test = Activities::where('column', 'value')->count();


        return view('user.reward', [
            'contents' => $contents,
            'contents_1' => $contents_1,
            'contents_2' => $contents_2,
            'contents_3' => $contents_3,
            'contents_1_1' => $contents_1_1,
            'contents_2_1' => $contents_2_1,
            'contents_3_1' => $contents_3_1,

            'contents_1_2' => $contents_1_2,
            'contents_2_2' => $contents_2_2,
            'contents_3_2' => $contents_3_2,

            'contents_1_3' => $contents_1_3,
            'contents_2_3' => $contents_2_3,
            'contents_3_3' => $contents_3_3,

            'contents_1_4' => $contents_1_4,
            'contents_2_4' => $contents_2_4,
            'contents_3_4' => $contents_3_4,

            'contents_1_5' => $contents_1_5,
            'contents_2_5' => $contents_2_5,
            'contents_3_5' => $contents_3_5,
            'rewards' => $rewards,
            'rewards2' => $rewards2,
            'rewards3' => $rewards3,
            'today' => $today,
            'slides1' => $slides1,
        ]);
    }

    public function getRewardDetail($id)
    {
        $reward = Rewards::find($id);
        $contents_1 = Rewards::orderBy('updated_at', 'DESC')->limit(4)->get();
        return view('user.reward_detail', [
            'reward' => $reward,
            'contents_1' => $contents_1
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
//        $reward->trackingRewards()->attach(Auth::user());
        $user = Users::find(Auth::user()->id);
        $user->point = $user->point - $reward->point;
        $reward->quantity = $reward->quantity - 1;

        $tracking_rewards = new TrackingRewards;
        $tracking_rewards->address = $request->get('address');
        $tracking_rewards->rewards_id = $request->get('rewards_id');
        $tracking_rewards->users_id = Auth::user()->id;

        $user->save();
        $reward->save();
        $tracking_rewards->save();
        return redirect()->back();
    }

}
