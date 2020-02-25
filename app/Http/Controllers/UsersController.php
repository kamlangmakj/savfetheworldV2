<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function getUsers() {
        $users = DB::table('users')->paginate(5);
        return view('admin.users.users',compact('users'));
    }

    public function postEditUsers(Request $request) {
//        return $request->all();
        $users = Users::find($request->get('id'));
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->gender = $request->get('gender');
        $users->phone = $request->get('phone');
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
