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
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {


        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if ($guard=="admin" && Auth::guard($guard)->check()) {

                $type=Auth::guard('admin')->user()->component;

                return match ($type) {
                    'IPTBM' => redirect(RouteServiceProvider::IPTBM_ADMIN_DASHBOARD),
                    'ABH' => redirect(RouteServiceProvider::ABH_ADMIN_DASHBOARD),
                    default =>redirect( '/admin/login'),
                };

            }


            if (Auth::check()) {


                $type=Auth::user()->component;

                return match ($type) {
                    'IPTBM' => redirect(RouteServiceProvider::IPTBM_STAFF_DASHBOARD),
                    'ATBI' =>redirect(RouteServiceProvider::ATBI_STAFF_DASHBOARD),
                    'ABH' => redirect(RouteServiceProvider::ABH_STAFF_DASHBOARD),
                    default =>redirect( '/'),
                };

            }
        }


        return $next($request);
    }
}
