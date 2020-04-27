<?php

namespace App\Http\Controllers;
use App\Province;
use App\User;
use App\Users;
use Carbon\Carbon;
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
        $users = Users::paginate(5);
//        $users = Users::all();
        $today = Carbon::today()->addYear(543)->translatedFormat('d M Y');

        return view('admin.users.users',[
            'users'=>$users,
            'today'=>$today,
        ]);
    }

    public function postEditUsers(Request $request) {
        $users = Users::find($request->get('id'));
        $provinces = Province::all();
//        dd($province[2]->PROVINCE_NAME);
        $users->name = $request->get('name');
//        $users->point = $request->get('point');
        $users->address = $request->get('address');
        $users->geography_id = $request->get('geography_id');
        $users->province_id = $request->get('province_id');
//        $users->amphur_id = $request->get('amphur_id');
//        $users->district_id = $request->get('district_id');
        $users->gender = $request->get('gender');
        $users->birth_date = $request->get('birth_date');
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

//        dd($user->id);
        $user -> delete();
        return redirect()->back();
    }

}
