<?php

namespace App\Http\Controllers\Reseller\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'reseller/auth/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:reseller')->except('logout');
    }   

    /**
     * Show login form for reseller
     *
     * @return Response::view
     */
    public function showLoginForm()
    {
        return view('reseller.login');
    }

    /**
     * Log user out of the system and redirect to reseller login form
     */
    public function logout()
    {
        auth()->guard('reseller')->logout();
    
        return redirect('reseller/auth/login');
    }

    /**
     * Login by reseller
     *
     * @return Response
     */
    public function login(Request $request) 
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

        if (auth()->guard('reseller')->attempt($credentials,  $request->has('remember')) && auth()->guard('reseller')->user()->status) {
            return $this->sendLoginResponse($request);
        } else {
            //if not active but correct logout
            if (!is_null(auth()->guard('reseller')->user())) auth()->guard('reseller')->logout();
            
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }
    }
}
