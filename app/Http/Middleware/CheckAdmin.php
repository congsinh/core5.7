<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->is_admin == 1){
                return $next($request);
            }
            Auth::logout();
            return redirect()->route('login')->with('error',"You don't have permission to access!");
        }else{
            return redirect()->route('login')->with('error','Please login to continue!');
        }
    }
}
