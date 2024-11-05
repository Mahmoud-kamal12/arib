<?php

namespace App\Http\Middleware;

use App\Http\Constants\User;
use App\Http\Constants\UserConstants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role ): Response
    {
        if ($request->user()->role === $role) {
            return $next($request);
        }

        return redirect()->route('welcome');
    }
}
