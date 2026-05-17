<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->email === 'admin@ticketflix.com') {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Administrators are not permitted to book tickets.');
        }

        return $next($request);
    }
}
