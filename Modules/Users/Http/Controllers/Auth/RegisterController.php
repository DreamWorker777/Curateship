<?php

namespace Modules\Users\Http\Controllers\Auth;

use Modules\Users\Providers\RouteServiceProvider;
use Modules\Users\Entities\User;
use Modules\Users\Entities\Role;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Modules\Admin\Entities\Settings;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Site global settings data
     *
     * @var array
     */
    protected $settings = [];

    /**
     * Enable/Disable full name field when register
     *
     * @var bool
     */
    protected $enable_fullname = true;

    /**
     * Enable/Disable email verification
     *
     * @var bool
     */
    protected $enable_verification = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->settings = Settings::getSiteSettings();
        $this->enable_fullname = !empty($this->settings['reg_en_fullname']) && $this->settings['reg_en_fullname'] === 'on';
        $this->enable_verification = !empty($this->settings['reg_en_verify_email']) && $this->settings['reg_en_verify_email'] === 'on';

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
        $validate_data = [
            'username'              => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'terms'                 => ['accepted']
        ];

        if ($this->enable_fullname) {
            $validate_data['full_name'] = ['required', 'string', 'max:255'];
        }

        return Validator::make($data, $validate_data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $permission = Role::where('key', 'registered')->first()->permission;


        return User::create([
            'username'   => $data['username'],
            'email'      => $data['email'],
            'name'       => isset($data['full_name']) ? $data['full_name'] : "",
            'password'   => Hash::make($data['password']),
            'permission' => $permission
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());

        Auth::loginUsingId($user->id);

        if ($this->enable_verification)
            $user->sendEmailVerificationNotification();

        $redirect_url = $user->permission === Role::where('key', 'admin')->first()->permission ? url('/admin') : RouteServiceProvider::HOME;

        return response()->json([
            'status'  => 'success',
            'message' => 'Registration successful.',
            'data'    => [
                'redirect_to' => $redirect_url
            ]
        ]);
    }

    public function showRegistrationForm()
    {
        return redirect('/');
    }

    public function ajaxShowForm(Request $request)
    {
        return view('components.auth.register-form');
    }
}
