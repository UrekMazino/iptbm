<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {



         return   $request->user()->hasVerifiedEmail()
                    ? redirect()->intended($this->routeSelect($request->user()->component))
                    : view('auth.verify-email');
    }

    private function routeSelect($type)
    {
        return match ($type)
        {
            'IPTBM' => RouteServiceProvider::IPTBM_STAFF_DASHBOARD,
            'ATBI' =>RouteServiceProvider::ATBI_STAFF_DASHBOARD,
            'ABH' => RouteServiceProvider::ABH_STAFF_DASHBOARD,
            default =>redirect( '/'),
        };
    }
}
