<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmCommercializationPathway;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmCommodity;
use App\Models\iptbm\IptbmDeploymentPathway;
use App\Models\iptbm\IptbmExtensionPathway;
use App\Models\iptbm\IptbmIndustry;
use App\Models\iptbm\IptbmInventor;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use App\Models\iptbm\IptbmResearchIndustryPartner;
use App\Models\iptbm\IptbmTechAgecnyPartner;
use App\Models\iptbm\IptbmTechCategory;
use App\Models\iptbm\IptbmTechCommodity;
use App\Models\iptbm\IptbmTechIndustry;
use App\Models\iptbm\IptbmTechInventor;
use App\Models\iptbm\IptbmTechnologyCategory;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Models\iptbm\IptbmTechResearchProject;
use App\Models\iptbm\IptbmTechStatus;
use App\Models\iptbm\IptbmTechTransPathway;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Technology extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     */
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */

    public function index(): Application|Factory|View|RedirectResponse
    {
       /*
        *  $profile = IptbmProfile::with("technologies")->where("agency_id", Auth::user()->profile->agency->id)->first();

        if (!$profile) {
            return redirect()->route("iptbm.staff.addProfile");
        }
        */
        $industry = IptbmIndustry::with('commodities', 'techcategory')->get();

        //   $technology = IptbmProfile::with("technologies")->where("agency_id", Auth::user()->profile->agency->id)->first();
        $technology = IptbmTechnologyProfile::with(
            'statuses.technology_profile',
            'techgenerators.inventor',
            'industries.industry',
            'ip_applications.ip_type',
            'pre_commercialization',
            'commercial_adopters',
        )->withTrashed()->where('iptbm_profile_id', Auth::user()->profile->id)->get();

        return view('iptbm.staff.technologies.index', [
            'industries' => $industry,
            'technologies' => $technology,
        ]);
    }

    public function iptbmtech()
    {
        //  $technology=IptbmTechnologyProfile::with("industry","commodities","category")->get();
        $profile = IptbmProfile::with("technologies.owner", "technologies.owner.agency")->where("region_id", Auth::user()->profile->agency->region->id)->get();
        foreach ($profile as $key => $value) {
            $value->agency = IptbmAgency::find($value->region_id);
            $value->region = IptbmRegion::find($value->agency_id);
        }

        $technology=IptbmTechnologyProfile::with('iptbmprofiles','owner.agency')
            ->whereHas('iptbmprofiles.agency.region',function ($region){
                $region->where('id',Auth::user()->profile->agency->region->id);
            })->latest()->get();


        return view('iptbm.staff.technologies.iptbm-tech', [
         //   'profile' => $profile,
            'technologies'=>$technology
        ]);
    }

    public function publicView($id)
    {
        $technology = IptbmTechnologyProfile::with("iptbmprofiles", "techgenerators.inventor","full_description.technology_photos")->find($id);
        //$techOwner = IptbmAgency::find($technology->tech_owner);
        return view('iptbm.staff.technologies.tech-public-view', compact('technology'));
    }

    public function delete_tech(Request $request): RedirectResponse
    {
        $request->validate([
            'delTech' => 'required'
        ]);

        IptbmTechnologyProfile::find($request->delTech)->delete();
        return redirect()->back();

    }

    public function techdetails(): Factory|View|Application|RedirectResponse
    {

        /*
         * $check = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)
            ->where('region_id', Auth::user()->profile->agency->region->id)
            ->exists();

        if (!$check) {
            return redirect()->route('iptbm.staff.addProfile');
        }
         */
        $profile = IptbmProfile::with('technologies')->where('agency_id', Auth::user()->profile->agency->id)->first();
        $industry = IptbmIndustry::with('commodities', 'techcategory')->get();

        return view('iptbm.staff.technologies.add-additional-details', [
            'profile' => $profile,
            'industries' => $industry
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:iptbm_technology_profiles',
            'yeardev' => 'required',
        ], [
            'yeardev.required' => 'Year field is empty',
        ]);

        $profile = IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
        $profile->technologies()->saveMany([
            new IptbmTechnologyProfile([
                'title' => $request->title,
                'year_developed' => $request->yeardev,
                'tech_owner' => Auth::user()->agency_id
            ])
        ]);

        $tech = IptbmTechnologyProfile::where('title', $request->title)->first();
        return redirect()->route('iptbm.staff.technology.show', ['id' => $tech->id]);
        // return redirect()->route("iptbm.staff.technology")->with('tech.success', 'Technology added successfully..!');
    }

    /**
     * Display the specified resource.
     */
    public function show(IptbmTechnologyProfile $id): Factory|View|Application|RedirectResponse
    {


        $this->authorize('view',$id);
        $technology = $id->load('industries.commodities', "owner.agency", 'ip_applications', 'ip_applications.ip_type', 'pre_commercialization', 'commercial_adopters', 'deployment', 'extension', 'full_description', 'industries.categories', 'statuses.technology_profile', 'techgenerators', 'techgenerators.inventor', 'techgenerators.inventor.agency_name', 'researchprojects.funder.agency', 'researchprojects.researchpartners');


        $IptbmIndustries = IptbmIndustry::all();

        foreach ($technology->industries as $val) {
            $val->industry = IptbmIndustry::select("name")->where('id', $val->iptbm_industry_id)->first();
            foreach ($val->commodities as $vv) {
                $vv->commodityName = IptbmCommodity::select("name")->where("id", $vv->iptbm_commodity_id)->first();
            }
            foreach ($val->categories as $vv) {
                $vv->categoryName = IptbmTechCategory::select("name")->where("id", $vv->iptbm_category_id)->first();
            }
        }
        foreach ($technology->techgenerators as $val) {
            $val->inventorsName = IptbmInventor::find($val->iptbm_inventors_id)->name;
        }

        if (sizeof($technology->ip_applications) > 0) {
            $technology->pathway = 'ip_applications';
        }
        if ($technology->pre_commercialization) {
            $technology->pathway = 'precom';
        }
        if ($technology->deployment) {
            $technology->pathway = 'deployment';
        }
        if ($technology->extension) {
            $technology->pathway = 'extension';
        }


        $pathway = IptbmTechTransPathway::all();
        return view('iptbm.staff.technologies.tech-view', [
            'technology' => $technology,
            'industries' => $IptbmIndustries,
            'inventors' => IptbmInventor::all(),
            'agencies' => IptbmAgency::with("region")->get(),
            'pathway' => $pathway
        ]);
    }

    public function update_pathway(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'pathway' => 'required',
        ]);
        if (IptbmExtensionPathway::where('technology_id', $id)->exists()) {
            return redirect()->back()->with('data_static', 'You currently unable to change this technology to another pathway.');
        }
        if (IptbmDeploymentPathway::where('technology_id', $id)->exists()) {
            return redirect()->back()->with('data_static', 'You currently unable to change this technology to another pathway.');
        }
        if (IptbmIpAlert::where('technology_id', $id)->exists()) {
            return redirect()->back()->with('data_static', 'You currently unable to change this technology to another pathway.');
        }
        if (IptbmCommercializationPathway::where('technology_id', $id)->exists()) {
            return redirect()->back()->with('data_static', 'You currently unable to change this technology to another pathway.');
        }
        if (IptbmCommercializationPrecom::where('technology_id', $id)->exists()) {
            return redirect()->back()->with('data_static', 'You currently unable to change this technology to another pathway.');
        }

        $technology = IptbmTechnologyProfile::find($id);
        $technology->tech_trans_plan = '';

        return redirect()->back();
    }

    public function update_title(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tech_title' => 'required|unique:iptbm_technology_profiles,title',
        ], [
            'tech_title.unique' => 'Technology Title already exists'
        ]);
        IptbmTechnologyProfile::find($id)->update([
            'title' => $request->tech_title
        ]);
        return redirect()->back()->with("title-success", "Technology updated successfully..!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateindustry(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'industry' => [
                'required',
                Rule::unique(IptbmTechIndustry::class, 'iptbm_industry_id')->where('iptbm_technology_id', $id)
            ],

        ]);
        $technology = IptbmTechnologyProfile::with("industries")->find($id);
        $technology->industries()->saveMany([
            new IptbmTechIndustry([
                'iptbm_industry_id' => $request->industry
            ])
        ]);
        return redirect()->back()->with('industry-success', 'Technology updated successfully..!');
    }

    public function industries(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $commodity = IptbmIndustry::with("commodities", "techcategory")->find($request->id);
        return response()->json([
            'data' => $commodity
        ]);
    }

    public function delete_industry(Request $request)
    {
        $request->validate([
            'industry_id' => 'required',
        ]);
        IptbmTechIndustry::find($request->industry_id)->delete();
        return redirect()->back();
    }

    public function updatecommodity(Request $request, string $id): RedirectResponse
    {
        /**
         * use id of industry of tyechnology
         */
        $request->validate([
            'commodity' => [
                'required',
                Rule::unique('iptbm_tech_commodities', 'commodity')
                    ->where('iptbm_industry_id', $id)
            ],
        ], [
            'commodity.unique' => 'Commodity has already been taken'
        ]);

        $tech = IptbmTechIndustry::find($id);

        $tech->commodities()->saveMany([
            new IptbmTechCommodity([
                'commodity' => $request->commodity
            ])
        ]);
        return redirect()->back()->with('commodity-success', 'Technology updated successfully..!');
    }

    public function updatecategory(Request $request, string $id): RedirectResponse
    {
        /**
         * use id of industry of tyechnology
         */
        $request->validate([
            //'category'=>'required|unique:iptbm_technology_categories,iptbm_category_id',
            'category' => [
                'required',
                Rule::unique('iptbm_technology_categories', 'iptbm_category_id')
                    ->where('iptbm_industry_id', $id)
            ],
        ], [
            'category.unique' => 'Category has already been taken'
        ]);


        $tech = IptbmTechIndustry::find($id);

        $tech->categories()->saveMany([
            new IptbmTechnologyCategory([
                'iptbm_category_id' => $request->category
            ])
        ]);
        return redirect()->back()->with('category-success', 'Technology updated successfully..!');
    }

    public function updatestatus(Request $request, string $id)
    {
        $request->validate([
            //'techstat' =>'required|unique:iptbm_tech_statuses,status',
            'techstat' => [
                'required',
                Rule::unique('iptbm_tech_statuses', 'status')
                    ->where('iptbm_technology_profile_id', $id)
            ]
        ], [
            'techstat.unique' => 'Status has already been taken'
        ]);

        $tech = IptbmTechnologyProfile::find($id);
        $tech->statuses()->saveMany([
            new IptbmTechStatus([
                'status' => $request->techstat
            ])
        ]);
        return redirect()->back()->with('status-success', 'Technology updated successfully..!');

    }

    public function updateinventor(Request $request, $id)
    {
        $request->validate([
            'inventor_id' => [
                'required',
                Rule::unique("iptbm_tech_inventors", "iptbm_inventors_id")
                    ->where("iptbm_technology_id", $id)
            ],
        ], [
            'inventor_id.unique' => 'Inventors name is already been taken..!'
        ]);

        $techProfile = IptbmTechnologyProfile::find($id);

        $techProfile->techgenerators()->saveMany([
            new IptbmTechInventor([
                'iptbm_inventors_id' => $request->inventor_id
            ])
        ]);

        return redirect()->back()->with('inventor-up-success', 'Technology updated successfully..!');
    }

    function researchconducted(Request $request, $id)
    {
        $request->validate([
            'research_title' => [
                'required',
                Rule::unique("iptbm_tech_research_projects", "title")
                    ->where("iptbm_technology_id", $id),
                'string',
                'max:255'
            ],
            'funding_agency' => 'required',
            'amount_invested' => 'required:numeric',
        ], [
            'research_title.unique' => 'Research Title exist..!'
        ]);
        $prof = IptbmTechnologyProfile::find($id);
        $prof->researchprojects()->saveMany([
            new IptbmTechResearchProject([
                'title' => $request->research_title,
                'agency_name' => $request->funding_agency,
                'amount' => $request->amount_invested
            ])
        ]);
        return redirect()->back()->with("research-add-success", "Research project added successfully");
    }

    public function industrypartners(Request $request, $id)
    {
        $request->validate([
            'industry_partner' => [
                'required',
                Rule::unique('iptbm_research_industry_partners', 'industry_name')
                    ->where('iptbm_tech_project_id', $id)
            ],
            'industry_address' => 'required',
        ]);

        if ($request->industry_phone) {
            $request->validate([
                'industry_phone' => 'numeric',
            ]);
        }
        if ($request->industry_mobile) {
            $request->validate([
                'industry_mobile' => 'numeric',
            ]);
        }
        if ($request->industry_fax) {
            $request->validate([
                'industry_fax' => 'numeric',
            ]);
        }
        if ($request->industry_email) {
            $request->validate([
                'industry_email' => 'email'
            ]);
        }

        $research = IptbmTechResearchProject::find($id);
        $research->researchpartners()->saveMany([
            new IptbmResearchIndustryPartner([
                'industry_name' => $request->industry_partner,
                'address' => $request->industry_address,
                'phone' => $request->industry_phone,
                'mobile' => $request->industry_mobile,
                'fax' => $request->industry_fax,
                'email' => $request->industry_email,
            ])
        ]);

        return redirect()->back()->with("partner-add-success", "Industry partner added successfully");
    }

    function delindustrypartners(Request $request)
    {
        $request->validate([
            'partner_id' => 'required',
        ]);
        IptbmResearchIndustryPartner::find($request->partner_id)->delete();
        return redirect()->back()->with("partner-del-success", "Industry partner deleted successfully");
    }

    public function deleteresearch(Request $request)
    {
        $request->validate([
            'researchr_id' => 'required',
        ]);
        IptbmTechResearchProject::find($request->researchr_id)->delete();
        return redirect()->back()->with('research-del-success', 'Technology deleted successfully..!');
    }

    public function deleteinventor(Request $request)
    {
        $request->validate([
            'inventor_id' => 'required',
        ]);
        IptbmTechInventor::find($request->inventor_id)->delete();
        return redirect()->back()->with('inventor-del-success', 'Technology deleted successfully..!');
    }

    public function deletestatus(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        $commodity = IptbmTechStatus::find($request->category_id)->delete();
        return redirect()->back()->with('status-del-success', 'Commodity Deleted successfully..!');
    }

    public function deletecategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        $commodity = IptbmTechnologyCategory::find($request->category_id)->delete();
        return redirect()->back()->with('category-del-success', 'Commodity Deleted successfully..!');
    }

    public function deletecmmodity(Request $request)
    {
        $request->validate([
            'commodity_id' => 'required',
        ]);
        $commodity = IptbmTechCommodity::find($request->commodity_id)->delete();
        return redirect()->back()->with('commodity-del-success', 'Commodity Deleted successfully..!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
