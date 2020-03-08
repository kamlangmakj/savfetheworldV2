<?php

namespace App\Http\Controllers;

use App\Rewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RewardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        $rewards = Rewards::find($request->get('id'));
        $rewards->name = $request->get('name');
        $rewards->detail = $request->get('detail');
        $rewards->point = $request->get('point');
        $rewards->quantity = $request->get('quantity');
        $rewards->rewards_category_id = $request->get('rewards_category_id');

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
            $rewards->image = $request->file('image')->move('uploads/activities',$fileNameToStore);
        }
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
