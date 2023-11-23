<?php

namespace App\Http\Controllers\abh;

use App\Http\Controllers\Controller;

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
