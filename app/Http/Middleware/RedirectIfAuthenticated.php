<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    /**
     * Handles the authentication middleware logic to redirect users based on their roles and components.
     *
     * @param Request $request The incoming HTTP request.
     * @param Closure $next The next middleware in the pipeline.
     * @param string ...$guards The authentication guards to be checked.
     * @return \Illuminate\Http\Response The response.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Set default guard if none provided
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                // If the user is an admin, redirect based on admin's component type
                $type = Auth::guard('admin')->user()->component;
                return match ($type) {
                    'IPTBM' => redirect(RouteServiceProvider::IPTBM_ADMIN_DASHBOARD),
                    'ABH' => redirect(RouteServiceProvider::ABH_ADMIN_DASHBOARD),
                    default => redirect('/admin/login'),
                };
            }

            // If the user is authenticated, redirect based on user's component type
            if (Auth::check()) {
                $type = Auth::user()->component;
                return match ($type) {
                    'IPTBM' => redirect(RouteServiceProvider::IPTBM_STAFF_DASHBOARD),
                    'ATBI' => redirect(RouteServiceProvider::ATBI_STAFF_DASHBOARD),
                    'ABH' => redirect(RouteServiceProvider::ABH_STAFF_DASHBOARD),
                    default => redirect('/'),
                };
            }
        }

        // If no specific redirection is required, proceed with the next middleware
        return $next($request);
    }

}
