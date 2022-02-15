<?php

namespace App\Http\Middleware;

use Closure;

class LoginCheckMiddleWare
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
        if($request->session()->has('userKey')){
            return $next($request);
        }
        else{
            return redirect('/login');
        }

    }
}