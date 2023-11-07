<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIndustry;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TechcompCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IptbmIndustry $industry): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $industry->load('techcategory');
        return view('admin.iptbm.add-record.tech-component.techCategory',compact('industry'));
    }

    public function temp()
    {
        $industries=IptbmIndustry::with('techcategory')->get();
        return view('admin.iptbm.add-record.tech-component.categories',compact('industries'));
    }
}
