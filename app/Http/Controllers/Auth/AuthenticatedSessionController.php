<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {


        $request->authenticate();

        $request->session()->regenerate();

        $type = Auth::user()->component;

        $route = $this->RedirectToComponent($type);


        return redirect()->intended($route);
    }

    /**
     * Handle an incoming authentication request.
     */

    public function RedirectToComponent($type)
    {


        return match ($type) {
            'IPTBM' => RouteServiceProvider::IPTBM_STAFF_DASHBOARD,
            'ATBI' => RouteServiceProvider::ATBI_STAFF_DASHBOARD,
            'ABH' => RouteServiceProvider::ABH_STAFF_DASHBOARD,
            default => redirect('/'),
        };
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
