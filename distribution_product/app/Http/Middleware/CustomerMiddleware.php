<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()
                ->route('admin.dashboard')
                ->with('error', 'Anda adalah admin. Silakan gunakan dashboard admin.');
        }

        Auth::logout();
        return redirect()
            ->route('login')
            ->with('error', 'Akses ditolak. Silakan login sebagai customer.');
    }
}