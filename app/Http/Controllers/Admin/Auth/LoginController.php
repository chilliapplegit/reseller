<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect admin after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/orders';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }   

    /**
     * Show login form for admin
     *
     * @return Response::view
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Log user out of the system and redirect to admin login form
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
    
        return redirect('admin/login');
    }

    /**
     * Login by admin
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

        if (auth()->guard('admin')->attempt($credentials,  $request->has('remember')) && auth()->guard('admin')->user()->status) {
            return $this->sendLoginResponse($request);
        } else {
            //if not active but correct logout
            if (!is_null(auth()->guard('admin')->user())) auth()->guard('admin')->logout();
            
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }
    }
}
