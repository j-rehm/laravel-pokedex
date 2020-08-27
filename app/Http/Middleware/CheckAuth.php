<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
        if (isset($_SESSION) && $_SESSION['CurrentUser']) {
            return $next($request);
        } else {
            return redirect()->route('index');
        }
    }
}
