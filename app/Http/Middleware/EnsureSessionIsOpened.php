<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionIsOpened
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(session()->all())) {
            if (session()->get('email') == '' || session()->get('email') == null) {
                return redirect()->route('login');
            }
            return $next($request);
        }
        return redirect()->route('login');
    }
}