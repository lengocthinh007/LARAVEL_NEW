<?php

namespace App\Http\Middleware;

use Closure;

class Checklogoutuser
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
        if(get_data_user('web'))
        {
             return redirect()->intended('User/home');
        }
        return $next($request);
    }
}
