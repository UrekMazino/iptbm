<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function RedirectToComponent($type)
    {


        return match ($type) {
            'IPTBM' => RouteServiceProvider::IPTBM_STAFF_DASHBOARD,
            'ATBI' =>RouteServiceProvider::ATBI_STAFF_DASHBOARD,
            'ABH' => RouteServiceProvider::ABH_STAFF_DASHBOARD,
            default =>redirect( '/'),
        };
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $type=Auth::user()->component;

        $route=$this->RedirectToComponent($type);


        return redirect()->intended($route);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
