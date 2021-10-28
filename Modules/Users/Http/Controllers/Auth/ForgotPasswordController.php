<?php

namespace Modules\Users\Http\Controllers\Auth;

use Modules\Users\Entities\User;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        // return view('users::auth.passwords.email');
        return redirect('/');
    }

    public function sendResetLinkEmail(Request $request){
      $this->validateEmail($request);
  
      $user = User::where('email', $request->email)->first();
      if(!$user){
        return response()->json([
          'status'  => 'error',
          'message' => "User with that email doesn't exist.",
          'data'    => null
        ]);
      } else {
        $response = $this->broker()->sendResetLink(
          $request->only('email')
        );
        if ($response == 'passwords.sent') {
          return response()->json([
            'status'  => 'success',
            'message' => "We've sent you a link to reset your password. Please check your email.",
            'data'    => null
          ]);
        }

        return response()->json([
          'status'  => 'error',
          'message' => "Something went wrong. Please try again.",
          'data'    => null
        ]);
      }
    }

    public function ajaxShowForm(Request $request)
    {
        return view('components.auth.reset-password-form');
    }
}