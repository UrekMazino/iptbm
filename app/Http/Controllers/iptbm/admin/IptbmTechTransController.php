<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmDeploymentPathway;
use App\Models\iptbm\IptbmExtensionPathway;
use Illuminate\Http\Request;

class IptbmTechTransController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()//commercialization precom
    {
        $precoms=IptbmCommercializationPrecom::latest()->get();
        return view('admin.iptbm.tech-trans.precom',compact('precoms'));
    }
    public function precom_view(IptbmCommercializationPrecom $precom)
    {
        return view('admin.iptbm.tech-trans.precom-view', compact('precom'));
    }



    public function adopter()
    {
        $adopters=IptbmCommercializationAdopter::latest()->get();
        return view('admin.iptbm.tech-trans.adopter',compact('adopters'));
    }

    public function adopter_view(IptbmCommercializationAdopter $adopter)
    {
        return view('admin.iptbm.tech-trans.adopter-view', compact('adopter'));
    }


    public function deployment()
    {
        $deployments=IptbmDeploymentPathway::latest()->get();
        return view('admin.iptbm.tech-trans.deployment',compact('deployments'));
    }

    public function extension()
    {
        $extensions=IptbmExtensionPathway::latest()->get();
        return view('admin.iptbm.tech-trans.extension',compact('extensions'));
    }
}
