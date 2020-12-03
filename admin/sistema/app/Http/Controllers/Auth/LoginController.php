<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function Login()
    {
        return view('auth.login');
    }

    public function Access(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = [
            'email' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials))
        {
            if(Auth::user()->state==0)
            {
                Auth::logout();
            }
            return redirect()->intended(route('dashboard'));
        }

        return back()->withInput(request(['username']));
    }

    public function Logout()
    {
        Auth::logout();
        return redirect(route('admin'));
    }
}
