<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class setPassMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user())
        {
            return redirect()->route('login');
        }
        else{
            if(Route::is('setpassword') && (auth()->user()->password_change == '0'))
            {
                return redirect()->route('dashboard');
            }
            if(!Route::is('setpassword') && (auth()->user()->password_change == '1'))
            {
                return redirect()->route('setpassword');
            }
        }


        return $next($request);
    }
}
