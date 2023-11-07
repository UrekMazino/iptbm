<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AddRecord extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('iptbm.admin.add-record.index');
    }
}
