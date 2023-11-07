<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIndustry;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TechCompIndustryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $industries=IptbmIndustry::with('commodities','commodities.industry','techcategory','techcategory.industry')->get();
        return view('admin.iptbm.add-record.tech-component.industries',compact('industries'));
    }
}
