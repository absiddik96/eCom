<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\Admin\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User\PersonalUser\PersonalUserBasicInfo;

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
    protected $redirectTo = '/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //........pre register page
    public function preRegister()
    {
        return view('auth.pre-register');
    }

    public function corporateRegister()
    {
        $roles=UserRole::pluck('name','id')->all();
        return view('auth.corporate-register', compact('roles'));
    }

    public function showRegistrationForm()
    {
        $roles = UserRole::pluck('name','id')->all();
        return view('auth.register', compact('roles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:50|confirmed',
            'gender' => 'required|string|min:1|max:10',
            'dob' => 'required|date',
            'role_id' => 'required|numeric',

        ],[
            'role_id.required'=>'The role field is required.'
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
        $user = User::create([
            'user_id' => User::generateUserId(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_token' => User::generateVerificationToken(),
            'role_id' => $data['role_id'],
        ]);

        PersonalUserBasicInfo::create([
            'user_id' => $user->user_id,
            'image' => '',
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'phone' => '',
            'fax' => '',
            'post_code' => '',
        ]);

        return $user;
    }

    //......corporate user register
    public function corporateCreate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:50|confirmed',
            'role_id' => 'required|numeric',

        ],[
            'role_id.required'=>'The role field is required.'
        ]);

        $input = $request->all();
        $input['user_id'] = User::generateUserId();
        $input['verification_token'] = User::generateVerificationToken();
        $input['is_corporate'] = User::CORPORATE_USER;
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);

        return redirect()->route('login');
    }

}
