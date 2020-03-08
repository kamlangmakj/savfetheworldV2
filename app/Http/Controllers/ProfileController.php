<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //    user profile
    public function getProfileUser() {
        $users = DB::table('users');
        return view('user.profile',compact('users'));
    }

    public function postEditProfileUser(Request $request) {
//        return $request->all();
        $users = Users::find($request->get('id'));
        $users->name = $request->get('name');
//        $users->email = $request->get('email');
        $users->gender = $request->get('gender');
        $users->phone = $request->get('phone');

        if ($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis').'_'.$fileName.'.'.$extension;
            $users->image = $request->file('image')->move('uploads/activities',$fileNameToStore);
        }
        $users->save();
        return redirect()->back();
    }

    public function getEditProfileUser($id) {
        $user = Users::find($id);
        return view('user.profile_edit',[
            'user'=>$user
        ]);
    }
}
