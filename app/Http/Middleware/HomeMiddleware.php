<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*Uses in Home Controller. It check the stage of registration and Auth users.*/
    public function handle($request, Closure $next)
    {
        
        if(!!Auth::user()){
           if(Auth::user()->role != 0){
                return redirect()->route('admin-dashboard');
           }
           if(Auth::user()->stage <= 3){
                return redirect()->route('FinalRegistration', [
                    'id' => Auth::user()->id,
                    'remember_token' => md5(Auth::user()->email),
                ]);
           }else{
                return $next($request);
           }
        }else{
            return redirect()->route('viewLogin');
        }
        return $next($request);
    }
}
