<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\iptbm\IptbmProfileResource;
use App\View\Components\iptbm\admin\IptbmProfile;
use Illuminate\Http\Request;

class IptbmApi extends Controller
{
    public function iptbm_profile()
    {
        return new IptbmProfileResource(\App\Models\iptbm\IptbmProfile::with('users')->get());
    }
}
