<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    /*Uses in Register Controller for cheking aythorized user or not. If user auth, he(she) redirected on home*/
    public function handle($request, Closure $next, $guard = null)
    {   
        if (Auth::guard($guard)->check()) {
            return redirect('/statistics');
        }

        return $next($request);
    }
}
