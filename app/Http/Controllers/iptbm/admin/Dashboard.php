<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
