<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class SupervisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user=Auth::user();
        if($user == null){
            return redirect('/login');
        }
        if( $user->isRole('supervisor') ) {       
            return $next($request);
        }else
        {
            return redirect('/login');
        }
    }
}
