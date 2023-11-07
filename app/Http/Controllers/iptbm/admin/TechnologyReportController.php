<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TechnologyReportController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $technologies=IptbmTechnologyProfile::all();
        return view('admin.iptbm.technologies.index',compact('technologies'));
    }

    public function view_tech(IptbmTechnologyProfile $technology)
    {
        return view('admin.iptbm.technologies.view-technology', compact('technology'));
    }

}
