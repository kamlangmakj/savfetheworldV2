<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //    admin users
    public function getUsers() {
        $users = DB::table('users')->paginate(5);
        return view('admin.users.users',compact('users'));
    }

    public function postEditUsers(Request $request) {
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

    public function getEditUsers($id) {
        $user = Users::find($id);
        return view('admin.users.edit_users',[
            'user'=>$user
        ]);
    }

    public function postDeleteUsers(Request $request) {
        $user = Users::find($request->get('id'));
        $user -> delete();
        return redirect()->back();
    }
}
