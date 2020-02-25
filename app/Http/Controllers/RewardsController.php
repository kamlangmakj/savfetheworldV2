<?php

namespace App\Http\Controllers;

use App\Rewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RewardsController extends Controller
{
    //
//    public function getRewards() {
//        $rewards = Rewards::all();
//        return view('admin.rewards',[
//            'rewards'=>$rewards
//        ]);
//    }

//    public function getRewards() {
//        $rewards = DB::table('rewards')->paginate(5);
//        return view('admin.rewards.rewards',compact('rewards'));
//    }

    public function getCreateRewards() {
        return view('admin.rewards.create_rewards');
    }

    public function postCreateRewards(Request $request) {
//        return $request->all();
        $rewards = new Rewards();
        $rewards->name = $request->get('name');
        $rewards->detail = $request->get('detail');
        $rewards->point = $request->get('point');
        $rewards->quantity = $request->get('quantity');
        $rewards->rewards_category_id = $request->get('rewards_category_id');
        $rewards->save();
        return redirect('admin/rewards');
    }

    public function postEditRewards(Request $request) {
//        return $request->all();
        $rewards = Rewards::find($request->get('id'));
        $rewards->name = $request->get('name');
        $rewards->detail = $request->get('detail');
        $rewards->point = $request->get('point');
        $rewards->quantity = $request->get('quantity');
        $rewards->rewards_category_id = $request->get('rewards_category_id');
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

//    public function search(Request $request)
//    {
//        $search = $request->get('search');
//        $rewards = DB::table('rewards')
//            ->where('id', 'like', '%'.$search.'%')
//            ->orWhere('name', 'like', '%'.$search.'%')
//            ->orderBy('id', 'desc')
//            ->get();
//        return view('admin.rewards.rewards',compact('rewards'));
//    }

    }
