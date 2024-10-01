<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('admin')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Veuillez vous connecter pour accéder à cette page.']);
        }

        return $next($request);
    }
}
