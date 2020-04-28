<?php

namespace App\Http\Middleware;

use Closure;

class Checklogoutadmin
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
        if(get_data_user('admin'))
        {
             return redirect()->intended('admin/home');
        }
        return $next($request);
    }
}
