<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProjectComponent
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string $component
     * @return Response|RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next, string $component): Response|RedirectResponse|JsonResponse
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to the default route if not authenticated
        }

        $user = Auth::user();
        // Check if the user's component matches the expected component
        if ($user->component == $component) {
            return $next($request); // Allow access to the requested component
        }

        return redirect('/'); // Redirect to the default route if the user's component doesn't match
    }
}
