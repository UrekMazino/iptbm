<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class EditRegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IptbmRegion $id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {

        $region=$id->load('agencies.profiles');

        return view('admin.iptbm.add-record.edit-region',compact('region'));
    }
}
