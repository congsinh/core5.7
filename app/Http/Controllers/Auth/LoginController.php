<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating user for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect user after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

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
        $remember = $request->has('remember') ? true : false;
        if(Auth::attempt([ 'email'=>$request->email, 'password'=>$request->password],$remember)){
            if(Auth::attempt([ 'email'=>$request->email, 'password'=>$request->password, 'is_admin' => 1 ])){
                return redirect()->route('admin.dashboard');
            }else{
                if($request->ajax()){
                    return response()->json(['error' => "You don't have permission to access!"],400);
                }
            }
        }
        else{
            if($request->ajax()){
                return response()->json(['error' => 'You have entered an invalid email or password !'],400);
            }
            return redirect()->route('login')->withInput()->with('error', 'You have entered an invalid email or password !');
        }
    }

    public function showLoginForm()
    {
        if(Auth::viaRemember() || Auth::check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('login');
    }
}
