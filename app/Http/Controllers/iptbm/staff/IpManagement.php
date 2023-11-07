<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Models\iptbm\IpType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class IpManagement extends Controller
{
    /**
     * > This function will run before any other function in the controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View|RedirectResponse
    {

        $profile = IptbmProfile::with("technologies")->where("agency_id", Auth::user()->profile->agency->id)->first();

        if(!$profile)
        {
            return redirect()->route("iptbm.staff.addProfile");
        }

        $ip_type = IpType::all();


        $tech=IptbmTechnologyProfile::with(
            "ip_applications",
            "ip_applications.ip_type",
            "ip_applications.expenses",
            "ip_applications.ip_task",
            "ip_applications.ip_task.stage",
            "ip_applications.protectionStatus",
            "industries",
            "ip_applications.patent_agent",
        )
            ->where("iptbm_profile_id",$profile->id)->get();


        return view('iptbm.staff.ipmanagement.index', [
            'technologies' => $profile->technologies,
            'ip_type' => $ip_type,
            'tech' => $tech,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'tech_id' => 'required',
            'ip_type' => [
                'required',
                Rule::unique(IptbmIpAlert::class, 'ip_type_id')
                    ->where("technology_id", $request->tech_id)
            ],
            'app_num'=>[
                'required',
                Rule::unique(IptbmIpAlert::class, 'application_number')
                    ->where("technology_id", $request->tech_id)
            ],
            'date_file'=>[
                'required',
                Rule::unique(IptbmIpAlert::class, 'date_of_filing')
                    ->where("technology_id", $request->tech_id)
            ]
        ],[
            'tech_id.required'=>'Technology is missing.',
            'tech_id.unique'=>'Technology is already been taken.',
            'app_num.required'=>'Application number is missing.',
            'app_num.unique'=>'Duplicate application number.'
        ]);
        $prof = IptbmTechnologyProfile::find($request->tech_id);


        $prof->ip_applications()->saveMany([
            new IptbmIpAlert([
                'ip_type_id'=>$request->ip_type,
                'application_number'=>$request->app_num,
                'date_of_filing'=>$request->date_file
            ])
        ]);

        return redirect()->back()->with('ip_app_success', "Application added successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
