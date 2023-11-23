<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Rules\iptbm\ValueExistsInTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class PrecomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View|RedirectResponse
    {
        $profile = IptbmProfile::with("technologies")->where("agency_id", Auth::user()->profile->agency->id)->first();

        if (!$profile) {
            return redirect()->route("iptbm.staff.addProfile");
        }
        $technologies = IptbmTechnologyProfile::where("iptbm_profile_id", Auth::user()->profile->id)->get();
        $precoms = IptbmCommercializationPrecom::with('technology', 'technology.iptbmprofiles', "modes")->get();
        foreach ($precoms as $val) {
            if ($val->technology) {
                $val->technology->tech_owner = IptbmAgency::find($val->technology->iptbmprofiles->agency_id);
            }

        }

        return view('iptbm.staff.precom.index', [
            'technologies' => $technologies,
            'pre_coms' => $precoms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'techno_id' => [
                'required',
                Rule::unique(IptbmCommercializationPrecom::class, 'technology_id'),
                new ValueExistsInTable([
                    'iptbm_extension_pathways' => 'technology_id',
                    // 'iptbm_deployment_pathways' => 'technology_id',
                    //  'iptbm_commercialization_adopters'=>'technology_id',
                    //'iptbm_ip_alerts'=>'technology_id',
                ], 'Technology', "Technology is currently under in different pathways.")
            ],
        ], [
            'techno_id.unique' => 'Technology is already present in the list table.',
        ]);

        $technology = IptbmTechnologyProfile::find($request->techno_id);
        if ($request->pre_com_tech_name) {
            $request->validate([
                'pre_com_tech_name' => [
                    'min:10',
                    Rule::unique(IptbmCommercializationPrecom::class, "pre_com_tech_name")
                ]
            ], [
                'pre_com_tech_name.min' => 'Technology Title must be minimum of 10 characters.',
                'pre_com_tech_name.unique' => 'Technology Title already exist.'
            ]);

            $technology->pre_commercialization()->save(new IptbmCommercializationPrecom([
                'pre_com_tech_name' => $request->pre_com_tech_name
            ]));
        } else {
            $technology->pre_commercialization()->save(new IptbmCommercializationPrecom([]));
        }

        return redirect()->back();
    }

    public function delete_precom(Request $request): RedirectResponse
    {
        $request->validate([
            'delPreCom' => 'required',
        ]);
        $precom = IptbmCommercializationPrecom::with('opinion_report')->find($request->delPreCom);
        if (File::exists(public_path($precom->market_study_summary))) {
            File::delete(public_path($precom->market_study_summary));
        }
        if (File::exists(public_path($precom->valuation_summary))) {
            File::delete(public_path($precom->valuation_summary));
        }
        if (File::exists(public_path($precom->freedom_operate_summary))) {
            File::delete(public_path($precom->freedom_operate_summary));
        }
        if (File::exists(public_path($precom->agreement_copy))) {
            File::delete(public_path($precom->agreement_copy));
        }
        if (File::exists(public_path($precom->financial_analysis))) {
            File::delete(public_path($precom->financial_analysis));
        }
        if (File::exists(public_path($precom->mach_test_cert))) {
            File::delete(public_path($precom->mach_test_cert));
        }
        if (File::exists(public_path($precom->feasibility_study))) {
            File::delete(public_path($precom->feasibility_study));
        }
        if (File::exists(public_path($precom->business_model))) {
            File::delete(public_path($precom->business_model));
        }

        foreach ($precom->opinion_report as $file) {
            if (File::exists(public_path($file->pdf_file))) {
                File::delete(public_path($file->pdf_file));
            }
        }

        IptbmCommercializationPrecom::find($request->delPreCom)->delete();
        return redirect()->back()->with('delete-precom', 'Data deleted successfully');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
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
