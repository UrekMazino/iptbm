<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @param string $role
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) // This isn't necessary, it should be part of your 'auth' middleware
            return redirect('/');
        $user = Auth::user();
        if ($user->role == $role)
            return $next($request);

        return redirect('/');
    }
}
