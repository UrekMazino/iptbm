<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended($this->routeSelect($request->user()->component));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }

    private function routeSelect($type)
    {
        return match ($type) {
            'IPTBM' => RouteServiceProvider::IPTBM_STAFF_DASHBOARD,
            'ATBI' => RouteServiceProvider::ATBI_STAFF_DASHBOARD,
            'ABH' => RouteServiceProvider::ABH_STAFF_DASHBOARD,
            default => redirect('/'),
        };
    }
}
