<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
        // if ()
        return $next($request);
    }
}
