<?php

namespace App\Http\Middleware;

use Closure;

class Empleado
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
        if(auth()->check()){
            if(auth()->user()->user_type == 2 || auth()->user()->user_type == 3)
            {
                return $next($request);
            }
        }
        return redirect(route('admin'));
    }
}
