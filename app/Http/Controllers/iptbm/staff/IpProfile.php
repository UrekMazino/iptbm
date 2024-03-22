<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Http\Resources\User;
use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmProfileContact;
use App\Models\iptbm\IptbmRegion;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class IpProfile extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|RedirectResponse|Application
    {


       /*
        *  $check = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)
            ->where('region_id', Auth::user()->profile->agency->region->id)
            ->exists();

        if (!$check) {
            return redirect()->route('iptbm.staff.addProfile');
        }
        */
        $profile = IptbmProfile::with('contact','users', 'projects', 'projects.projectDetails', 'agency',  'agency.region')->where('agency_id', Auth::user()->profile->agency->id)->first();


        return view('iptbm.staff.profile.index', [
            'profile' => $profile,
              // 'agency' => IptbmAgency::where('iptbm_region_id', Auth::user()->region_id)->get()
        ]);
    }


    /**
     * @return View|Factory|Application
     *
     * display all iptbm profiles in all regions
     */
    public function allProfile(): View|Factory|Application
    {
        $profile = IptbmProfile::with('agency','agency.region')
            ->whereHas('agency')

            ->latest()->get();


        return view('iptbm.staff.profile.all-profile', [
            'profile' => $profile
        ]);
    }

    public function viewProfile(IptbmProfile $id): View|Factory|Application
    {
        $profile = $id->load('contact', 'projects.projectDetails','contact_mobile','contact_phone','contact_fax','contact_email');

        $profile->agency = IptbmAgency::find($profile->agency_id);
        $profile->agency_head = AgencyHead::find($profile->agency->id);
        $profile->region = IptbmRegion::find($profile->region_id);

        return view('iptbm.staff.profile.public-view', [
            'profile' => $profile,
        ]);
    }

    public function all_profile_projects(IptbmProfile $profile): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $profile->load('projects');


        return view('iptbm.staff.profile.profile-all-project',compact('profile'));
    }






}
