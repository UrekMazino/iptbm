<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmCommodity;
use App\Models\iptbm\IptbmIndustry;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TechCommodityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IptbmIndustry $industry): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $industry->load('commodities');
       return view('admin.iptbm.add-record.tech-component.techCommodity', compact('industry'));
    }

    public function temp()
    {
        $industries=IptbmIndustry::with('commodities')->get();
        return view('admin.iptbm.add-record.tech-component.commodities',compact('industries'));
    }
}

