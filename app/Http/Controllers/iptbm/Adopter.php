<?php

namespace App\Http\Controllers\iptbm;

use App\Http\Controllers\Controller;

class Adopter extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('iptbm.staff.adopter.index');
    }
}
