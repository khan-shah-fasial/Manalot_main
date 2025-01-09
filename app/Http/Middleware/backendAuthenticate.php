<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;
class backendAuthenticate
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
        if(isset(auth()->user()->id) && auth()->user()->id && auth()->user()->role_id == 1):
            if($request->route()->getName() == 'backend.login'):
                return  redirect(route('backend.dashboard'));
            else:
                return $next($request); 
            endif;            
        else:
            if($request->route()->getName() == 'backend.login'):
                return $next($request);
            else:
                return  redirect(route('backend.login'));
            endif;
        endif;
    }
}