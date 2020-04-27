<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'image' => ['required', 'string'],
            'address' => ['required', 'string'],
            'geography_id' => ['required', 'int'],
            'province_id' => ['required', 'int'],
            'gender' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:10'],
//            'register_favorite_type' => ['required', 'string', 'max:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        return $data;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
//            'image' => $data['image'],
            'address' => $data['address'],
            'geography_id' => $data['geography_id'],
            'province_id' => $data['province_id'],
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);


//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
////            'image' => $data['image'],
//            'address' => $data['address'],
//            'geography_id' => $data['geography_id'],
//            'province_id' => $data['province_id'],
//            'gender' => $data['gender'],
//            'birth_date' => $data['birth_date'],
//            'phone' => $data['phone'],
//            'password' => Hash::make($data['password']),
//        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $user->registerFavoriteType()->attach($request->get('register_favorite_type'));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
