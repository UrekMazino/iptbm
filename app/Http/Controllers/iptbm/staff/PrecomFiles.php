<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrecomFiles extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        return view('iptbm.staff.precom.precom-files',[
            'id' => $id,
        ]);
    }
}
