<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function login(Request $request)
    {
        $user = [
            'email' => $request->email,
            'password' => $request->password,
            // 'remember'=> $request->rememberToken,
        ];

        $messages = [
            // "email.required" => "Email is required",
            // "email.email" => "Email is not valid", <-buat register
            "email.exists" => "Email doesn't exists",
            // "password.required" => "Password is required",
            // "password.min" => "Password must be at least 6 characters", <-buat register
            // "password.password" => "Email or password is invalid"
        ];

        $validator = Validator::make($request->all(), [
            // 'email' => 'required|email|exists:users,email',
            'email' => 'exists:users,email',
            // 'password' => 'required||min:6'
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // attempt to log
            if(Auth::attempt($user)){
                return redirect()->route('catalog');
            }

            // if unsuccessful -> redirect back
            return redirect()->back()->withInput($request->only('email', 'password'))->withErrors([
                'password' => 'Password is incorrect.',
            ]);
        }

        // return redirect()->route('login')->with('Fail', 'User email or password is not exist');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return $this->LoggedOut($request) ?: redirect('login');
    }
}
