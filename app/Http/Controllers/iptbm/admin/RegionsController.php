<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $regions=IptbmRegion::with('agencies')->get();
        return view('admin.iptbm.add-record.regions',compact('regions'));
    }

    public function regions_ajax(): \Illuminate\Http\JsonResponse
    {
        $regions=IptbmRegion::with('agencies')->get();
        return response()->json([
            'data'=>$regions
        ]);
    }

    public function add_region_view(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.iptbm.add-record.add-region');
    }

    public function add_region(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'region_name'=>'required|unique:iptbm_regions,name',
            'region_rrdcc_chair'=>'required|min:5',
            'region_consortium'=>'required|unique:iptbm_regions,consortium',
            'region_consortium_director'=>'required|min:8'
        ]);
        IptbmRegion::create([
            'name'=>$request['region_name'],
            'rrdcc_chair'=>$request['region_rrdcc_chair'],
            'consortium'=>$request['region_consortium'],
            'consortium_director'=>$request['region_consortium_director'],
        ]);
        return redirect()->back()->with('add_region','New Region was added successfully');
    }
}
