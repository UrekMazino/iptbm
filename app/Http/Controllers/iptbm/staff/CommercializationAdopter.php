<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Rules\iptbm\ValueExistsInTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommercializationAdopter extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|View|Application
    {

        $profile = IptbmProfile::with("technologies", "technologies.commercial_adopters")->where("agency_id", Auth::user()->profile->agency->id)->first();
        $technology = IptbmCommercializationAdopter::with(["contacts", "technology" => function ($query) {
            $query->with(["iptbmprofiles" => function ($qr2) {
                $qr2->where("agency_id", Auth::user()->agency_id);
            }]);
        }])->get();


        return view('iptbm.staff.adopter.index', [
            'profile' => $profile,
            'technologies' => $technology
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'tech' => [
                'required',
                new ValueExistsInTable([
                    'iptbm_extension_pathways' => 'technology_id',

                    'iptbm_deployment_pathways' => 'technology_id',
                ], 'Technology', "Technology is currently under in different pathways.")
            ],
            'company_name' => [
                'required',
                'min:5',
                Rule::unique(IptbmCommercializationAdopter::class, 'company_name')->where('technology_id', $request->tech)
            ],
            'company_address' => 'required|min:5',
            'comp_desc' => 'required|min:5',
            'business_struct' => 'required|min:5',
            'business_reg' => 'required|min:5',
            'tech_aqui' => 'required|min:5',
        ], [
            'tech.required' => 'Technology is missing.',
            'comp_desc.required' => 'The Company Description is missing',
            'business_struct.required' => 'The business structure is missing',
            'tech_aqui.required' => 'The Technology acquisition is missing',
            'business_reg.required' => 'The Business Registration is missing',
        ]);

        $technology = IptbmTechnologyProfile::find($request->tech);

        $technology->extension()->save(new IptbmCommercializationAdopter([
            'company_name' => $request['company_name'],
            'company_description' => $request['comp_desc'],
            'address' => $request['company_address'],
            'business_structures' => $request['business_struct'],
            'business_registration' => $request['business_reg'],
            'acquisition_model' => $request['tech_aqui'],
            'for_incubation' => (bool)$request['for_incu']
        ]));

        return redirect()->back();

    }
}
