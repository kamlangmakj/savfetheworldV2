<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.Admin-login');
    }

    public function login(Request $request)
    {
        //validate the form
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:8',

        ]);
        //attempt to login
        if(Auth::guard('admin')->attempt(['email'=> $request->email,  'password'=> $request->password], $request->remember))
        {
            //if login successful
            return redirect()->intended(route('admin.index'));
        }
        //if unsuccessful
        return redirect()->back()->with($request->only('email','remember'));
    }
}
