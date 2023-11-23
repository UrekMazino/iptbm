<?php

namespace App\Http\Controllers\abh\staff;

use App\Http\Controllers\Controller;

class AbhProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = \Auth::user()->abh_profile;
        return view('abh.profile.index', compact('profile'));
    }
}
