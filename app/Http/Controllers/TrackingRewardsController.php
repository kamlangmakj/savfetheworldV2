<?php

namespace App\Http\Controllers;

use App\Rewards;
use App\TrackingRewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingRewardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //    admin tracking_rewards
    public function getTrackingRewards()
    {
        $tracking_rewards = TrackingRewards::orderBy('id','DESC')->paginate(5);
//        $tracking_rewards = TrackingRewards::orderBy('id','ASC')->paginate(5);
        return view('admin.tracking_rewards.tracking_rewards', compact('tracking_rewards'));
    }

    public function postEditTrackingRewards(Request $request)
    {
//        return $request->all();
        $tracking_rewards = TrackingRewards::find($request->get('id'));
        $tracking_rewards->status_id = $request->get('status_id');
        $tracking_rewards->code = $request->get('code');
        $tracking_rewards->address = $request->get('address');

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis') . '_' . $fileName . '.' . $extension;
            $tracking_rewards->image = $request->file('image')->move('uploads/tracking_rewards', $fileNameToStore);
        }
        $tracking_rewards->save();
        return redirect()->back();
    }

    public function getEditTrackingRewards($id)
    {
        $tracking_reward = TrackingRewards::find($id);
        return view('admin.tracking_rewards.edit_tracking_rewards', [
            'tracking_reward' => $tracking_reward
        ]);
    }

    public function postDeleteTrackingRewards(Request $request)
    {
        $tracking_reward = TrackingRewards::find($request->get('id'));
//        dd($tracking_reward->id);
        $tracking_reward->delete();
        return redirect()->back();
    }

//    public function destroy($id) {
//        $tracking_reward = TrackingRewards::find($id);
////        dd($tracking_reward->id);
//        $tracking_reward -> delete();
//        return redirect()->back();
//    }

//    public function getTrackingRewards($id)
//    {
//        $tracking_reward = TrackingRewards::find($id);
//        return view('admin.tracking_rewards.tracking_rewards',[
//            'tracking_reward'=>$tracking_reward
//        ]);
//    }

}
