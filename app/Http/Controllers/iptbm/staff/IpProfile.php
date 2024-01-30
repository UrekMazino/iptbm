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
        $profile = IptbmProfile::with('contact', 'projects', 'projects.projectDetails', 'agency',  'agency.region')->where('agency_id', Auth::user()->profile->agency->id)->first();


        return view('iptbm.staff.profile.index', [
            'profile' => $profile,
            //   'agency' => IptbmAgency::where('iptbm_region_id', Auth::user()->region_id)->get()
        ]);
    }


    /**
     * @return View|Factory|Application
     *
     * display all iptbm profiles in all regions
     */
    public function allProfile(): View|Factory|Application
    {
        $profile = IptbmProfile::all();
        foreach ($profile as $val) {
            $val->region = IptbmRegion::select('name')->where('id', $val->region_id)->first();
            $val->agency = IptbmAgency::select('name')->where('id', $val->agency_id)->first();
            $val->access_state = Auth::user()->agency_id == $val->agency_id && Auth::user()->profile->agency->region->id;
        }
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

    public function all_profile_projects(IptbmProfile $profile)
    {
        $profile->load('projects');


        return view('iptbm.staff.profile.profile-all-project',compact('profile'));
    }

    public function update_ip_policy(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'ip_policy' => 'required|boolean',
        ]);
        $profile = IptbmProfile::find($id);
        $profile->ip_policy = $request->ip_policy;
        $profile->save();
        return redirect()->back();
    }

    public function update_techno_transfer(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'techno_transfer' => 'required|boolean',
        ]);
        $profile = IptbmProfile::find($id);
        $profile->techno_transfer = $request->techno_transfer;
        $profile->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource. bvc
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $name)
    {

        if ($name === 'agency_address') {
            $request->validate([
                'agency_address' => 'required|string|min:6'
            ]);
            $profile = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
            $profile->office_address = $request->agency_address;
            if (!$profile->save()) {
                return redirect()->route('iptbm.staff.ipProfile')->with('fail', 'Unable to update..!');
            }

            return redirect()->route('iptbm.staff.ipProfile')->with('success', 'Agency updated successfully..!');
        }


        if ($name === 'agency_head') {
            $request->validate([
                'agency_head' => 'required|string|min:6'
            ]);
            $agency = AgencyHead::where('iptbm_agency_id', Auth::user()->profile->agency->id)->first();
            $agency->head = $request->agency_head;
            if (!$agency->save()) {
                return redirect()->route('iptbm.staff.ipProfile')->with('head-fail', 'Unable to update..!');
            }

            return redirect()->route('iptbm.staff.ipProfile')->with('head-success', 'Updated successfully..!');
        }


        if ($name === 'project_leader') {
            $request->validate([
                'project_leader' => 'required|string|min:6'
            ]);
            $projectLead = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
            $projectLead->project_leader = $request->project_leader;
            if (!$projectLead->save()) {
                return redirect()->route('iptbm.staff.ipProfile')->with('project-leader-fail', 'Unable to update..!');
            }

            return redirect()->route('iptbm.staff.ipProfile')->with('project-leader-success', 'Updated successfully..!');
        }


        if ($name === 'year_established') {
            $request->validate([
                'year_established' => 'required'
            ]);
            $projectLead = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
            $projectLead->year_established = $request->year_established;
            if (!$projectLead->save()) {
                return redirect()->route('iptbm.staff.ipProfile')->with('year-established-fail', 'Unable to update..!');
            }

            return redirect()->route('iptbm.staff.ipProfile')->with('year-established-success', 'Updated successfully..!');
        }

        if ($name === 'iptbm_manager') {
            $request->validate([
                'iptbm_manager' => 'required|string|min:6'
            ]);
            $projectLead = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
            $projectLead->manager = $request->iptbm_manager;
            if (!$projectLead->save()) {
                return redirect()->route('iptbm.staff.ipProfile')->with('iptbm-manager-fail', 'Unable to update..!');
            }

            return redirect()->route('iptbm.staff.ipProfile')->with('iptbm-manager-success', 'Updated successfully..!');
        }
        return redirect()->route('iptbm.staff.ipProfile')->with('fail-request', 'Something went wrong..!');
    }

    public function addcontact(Request $request, string $type): RedirectResponse
    {

        switch ($type) {
            case "phone":
                $request->validate([
                    'contact' => 'required|unique:iptbm_profile_contacts|numeric'
                ],
                    [
                        'contact.unique' => 'Phone number details has already been taken.'
                    ]
                );
                break;
            case "mobile":
                $request->validate([
                    'contact' => 'required|unique:iptbm_profile_contacts|numeric'
                ],
                    [
                        'contact.unique' => 'Mobile number  has already been taken.'
                    ]
                );
                break;
            case "fax":
                $request->validate([
                    'contact' => 'required|unique:iptbm_profile_contacts|numeric'
                ],
                    [
                        'contact.unique' => 'Fax number has already been taken.'
                    ]
                );
                break;
            case "email":
                $request->validate(
                    [
                        'contact' => 'required|email|unique:iptbm_profile_contacts'
                    ],
                    [
                        'contact.unique' => 'Email address has already been taken.'
                    ]
                );
                break;
        }


        $profile = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
        if (!$profile->contact()->saveMany([
            new IptbmProfileContact([
                'contact_type' => $type,
                'contact' => $request->contact
            ]),
        ])) {
            return redirect()->route('iptbm.staff.ipProfile')->with('iptbm-add-contact-fail', 'Unable to update..!');
        }

        return redirect()->route('iptbm.staff.ipProfile')->with('iptbm-add-contact-success', 'contact added successfully..!');

    }

    public function deletecontact(Request $request, string $id): RedirectResponse
    {
        $contact = IptbmProfileContact::find($id);
        if (!$contact->delete()) {
            return redirect()->route('iptbm.staff.ipProfile')->with('iptbm-contact-fail', 'Unable to delete..!');
        }
        return redirect()->route('iptbm.staff.ipProfile')->with('iptbm-contact-success', 'Deleted..!');
    }

    public function upload_logo(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $profile = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
        $logo = $request->profile_logo->hashName();
        $request->profile_logo->move(public_path('storage/profile'), $logo);

        if (File::exists(public_path($profile->logo))) {
            File::delete(public_path($profile->logo));
        }
        $profile->logo = 'storage/profile/' . $logo;

        $profile->save();
        return redirect()->back();
    }

    public function tagline(Request $request)
    {
        $request->validate([
            'tagline' => 'required|min:5',
        ]);
        $profile = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
        $profile->tag_line = $request->tagline;
        $profile->save();
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
