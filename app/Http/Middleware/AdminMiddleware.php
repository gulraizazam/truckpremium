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
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       $user=Auth::user();
      if($user == null){
        return redirect('/login');
      }
      if( $user->isRole('admin') ) {
               
        return $next($request);
        }
        
        elseif( $user->isRole('supervisor') ){
            return redirect('error');
        }
        else{
           return redirect('/login');
        }
    }
}
