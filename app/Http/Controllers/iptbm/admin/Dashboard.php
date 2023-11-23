<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin_iptbm');
    }

    public function index()
    {
        return view('admin.iptbm.dashboard');
    }
}
