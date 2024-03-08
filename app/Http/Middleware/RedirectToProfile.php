<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToProfile
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            return redirect('/user/profile');
        }

        return $next($request);
    }
}
