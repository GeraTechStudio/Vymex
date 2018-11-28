<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RegistrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*Uses in Final Controller. It check the stage of registration.*/
    public function handle($request, Closure $next)
    {
        
        if(!!Auth::user()){
           if(Auth::user()->stage <= 3){
                return $next($request);
           }else{
                return redirect()->route('home');
           }
        }else{
            return redirect()->route('viewLogin');
        }
        return $next($request);
    }
}
