<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $role)
    {
        if(!\Auth::user()){
            return redirect()->route('viewLogin');
        }
        switch($role){
            case 'admin':
                switch (Auth::user()->role) {
                    case 0:
                        return redirect()->route('home');
                        break;
                }
               break;
            default:
                return redirect()->route('home');
                break;
            }
        return $next($request);
    }
}
