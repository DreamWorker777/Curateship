<?php

namespace Modules\Users\Http\Controllers\Auth;

use Modules\Users\Providers\RouteServiceProvider;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Modules\Users\Entities\User;
use Modules\Users\Entities\Role;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return redirect('/#login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user         = User::where('email', $request->input('email'))->first();
            $redirect_url = $user->permission === Role::where('key', 'admin')->first()->permission ? url('/admin') : $this->redirectTo;

            // check if account is inacitve/ suspended
            if ($user->permission < 1) {
                $this->logout($request);

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Failed to sign in. Your account is suspended.',
                    'data'    => null
                ]);
            }

            return response()->json([
                'status'  => 'success',
                'message' => 'Login successful. You will be redirected in a moment.',
                'data'    => [
                    'redirect_url' => $redirect_url
                ]
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'Failed to log in. Either email or password is incorrect.',
            'data'    => null
        ]);

    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required', 'string'],
            'password'        => ['required', 'string'],
        ]);
    }

    public function ajaxShowForm(Request $request)
    {
        return view('components.auth.login-form');
    }

}
