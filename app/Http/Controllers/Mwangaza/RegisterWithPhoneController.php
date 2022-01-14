<?php

namespace App\Http\Controllers\Mwangaza;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Traits\ActivationTrait;
use App\Traits\CaptchaTrait;
use App\Traits\CaptureIpTrait;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;

class RegisterWithPhoneController extends Controller
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

    use ActivationTrait;
    use CaptchaTrait;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/activate';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', [
            'except' => 'logout',
        ]);
    }

    public function registerFromComment(Request $request)
    {
//        return $request["phone"];

        $user = User::where('phone',$request["phone"])->first();
        if (isset($user)){
            Auth::login($user);
            return redirect()->back();
        }else{
            $this->create($request->all());
            return "Jumaa";
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $data['captcha'] = $this->captchaCheck();

        if (! config('settings.reCaptchStatus')) {
            $data['captcha'] = true;
        }

        return Validator::make(
            $data,
            [
                'first_name'            => 'alpha_dash',
                'phone'                 => 'required|phone|max:255|unique:users',
                'password'              => 'required|min:6|max:30|confirmed',
                'password_confirmation' => 'required|same:password',
                'g-recaptcha-response'  => '',
                'captcha'               => 'required|min:1',
            ],
            [
                'first_name.required'           => trans('auth.fNameRequired'),
                'phone.required'                => "Phone Number is Required",
                'password.required'             => trans('auth.passwordRequired'),
                'password.min'                  => trans('auth.PasswordMin'),
                'password.max'                  => trans('auth.PasswordMax'),
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name'            => 'alpha_dash',
                'phone'                 => 'required|phone|max:255|unique:users',
                'password'              => 'required|min:6|max:30|confirmed',
                'password_confirmation' => 'required|same:password',
                'g-recaptcha-response'  => '',
                'captcha'               => 'required|min:1',
            ],
            [
                'first_name.required' => trans('auth.fNameRequired'),
                'phone.required'      => "Phone is required",
                'email.email'         => trans('auth.emailInvalid'),
                'password.required'   => trans('auth.passwordRequired'),
                'password.min'        => trans('auth.PasswordMin'),
                'password.max'        => trans('auth.PasswordMax'),
                'role.required'       => trans('auth.roleRequired'),
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $ipAddress = new CaptureIpTrait();
        $profile = new Profile();

        $user = User::create([
            'name'             => strip_tags($request->input('name')),
            'first_name'       => strip_tags($request->input('first_name')),
            'last_name'        => strip_tags($request->input('last_name')),
            'email'            => $request->input('email'),
            'password'         => Hash::make($request->input('password')),
            'token'            => str_random(64),
            'admin_ip_address' => $ipAddress->getClientIp(),
            'activated'        => 1,
        ]);

        $user->profile()->save($profile);
        $user->attachRole($request->input('role'));
        $user->save();

        return redirect('users')->with('success', trans('usersmanagement.createSuccess'));
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {

        $this->validator($data);

        $ipAddress = new CaptureIpTrait();

        if (config('settings.activation')) {
            $role = Role::where('slug', '=', 'unverified')->first();
            $activated = false;
        } else {
            $role = Role::where('slug', '=', 'user')->first();
            $activated = true;
        }

        $user = User::create([
            'first_name'        => strip_tags($data['first_name']),
            'phone'             => $data['phone'],
            'password'          => Hash::make($data['password']),
            'token'             => str_random(64),
            'signup_ip_address' => $ipAddress->getClientIp(),
            'activated'         => $activated,
        ]);

        $user->attachRole($role);
        $this->initiateEmailActivation($user);

        $profile = new Profile();
        $user->profile()->save($profile);
        $user->save();

        return $user;
    }
}
