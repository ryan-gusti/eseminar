<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Alert;

class IsAdmin
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
        if(auth()->user()->role == 'admin') {
            return $next($request);
        }

        Alert::error('Error!', 'Anda tidak memiliki akses!');
        return redirect('/user/home');
    }
}
