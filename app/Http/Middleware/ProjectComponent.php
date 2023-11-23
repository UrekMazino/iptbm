<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectComponent
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (\Illuminate\Http\Response|RedirectResponse) $next
     * @param string $component
     * @return \Illuminate\Http\Response|RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next, string $component): \Illuminate\Http\Response|RedirectResponse|JsonResponse
    {
        if (!Auth::check()) // This isn't necessary, it should be part of your 'auth' middleware
            return redirect('/');

        $user = Auth::user();
        if ($user->component == $component)
            return $next($request);

        return redirect('/');
    }
}
