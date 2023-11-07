<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\AgencyContact;
use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AddProfile extends Controller
{
    public function index(): Factory|View|Redirector|Application|RedirectResponse
    {
        //Auth::user()->profile->agency->region->id
        $profile=IptbmProfile::where('agency_id',Auth::user()->profile->agency->id)
            ->where('region_id',Auth::user()->profile->agency->region->id)
            ->exists();

        if($profile){
            return redirect()->route('iptbm.staff.ipProfile');
        }

        $agency=IptbmAgency::find(Auth::user()->agency_id);
        $agency->contact=AgencyContact::where('iptbm_agency_id',$agency->id)->first();
        $agency->heads=AgencyHead::where('iptbm_agency_id',$agency->id)->get();

        return view('iptbm.staff.other.add-profile',[
            'region'=>IptbmRegion::find(Auth::user()->profile->agency->region->id),
            'agency'=>$agency
        ]);
    }



    public function addprofile(Request $request): RedirectResponse
    {

        $request->validate([
            'agency_id'=>'required',
            'region_id'=>'required'
        ]);
        IptbmProfile::create([
            'agency_id'=>$request->agency_id,
            'region_id'=>$request->region_id
        ]);

        return redirect()->route('iptbm.staff.ipProfile')->with('status','Profile created successfully..!');
    }
}
