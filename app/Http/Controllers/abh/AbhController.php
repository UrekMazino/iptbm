<?php

namespace App\Http\Controllers\abh;

use App\Http\Controllers\Controller;
use App\Models\abh\AbhAgency;
use App\Models\abh\AbhProfile;
use App\Models\abh\AbhRegion;
use App\View\Components\abh\AbhLayout;

class AbhController extends Controller
{
    public function __construct()
    {

    }

    public function dashboard()
    {
        return view('abh.dashboard');
    }

}
