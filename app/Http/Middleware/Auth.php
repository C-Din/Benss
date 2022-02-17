<?php

namespace App\Http\Middleware;

use Closure;
use Flashy;
use Illuminate\Http\Request;

class Auth
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
        if(auth()->guest())
        {
            Flashy::error('Vous devez être connecté pour éffectuer cet action!');
            return back()->withInput();
        }
        else
        {
            return $next($request);
        }
    }
}
