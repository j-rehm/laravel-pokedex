<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
        // If the session object exists, allow request
        // Otherwise redirect to home page
        if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
            return $next($request);
            app(SessionController::class)->updateSession();
        } else {
            return redirect()->route('index');
        }
    }
}
