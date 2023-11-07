<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAdoptor;
use App\Models\iptbm\IptbmCommercializationPathway;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmDeploymentPathway;
use App\Models\iptbm\IptbmExtensionPathway;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Rules\iptbm\ValueExistsInTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ExtensionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|View|Application
    {
        $Extension = IptbmExtensionPathway::with('technology')->get();
        $profile = IptbmProfile::with("technologies","technologies.techgenerators","technologies.techgenerators.inventor")->where("agency_id", Auth::user()->profile->agency->id)->first();


        return view('iptbm.staff.extension.index', [
            'extenTech' => $Extension,
            'profile' => $profile
        ]);
    }

    public function extend_tech(Request $request): RedirectResponse
    {
        $request->validate([
            'techId' => [
                'required',
                'unique:iptbm_extension_pathways,technology_id',
                new ValueExistsInTable([
                    'iptbm_ip_alerts' => 'technology_id',
                    'iptbm_commercialization_precoms' => 'technology_id',
                    'iptbm_deployment_pathways' => 'technology_id',
                    'iptbm_commercialization_adopters'=>'technology_id',
                ], 'Technology', "Technology is already present in another pathways.")
            ],
            'adopter' => [
                'required',
                'min:5',
                Rule::unique(IptbmExtensionPathway::class, 'adoptor_name')->where('technology_id', $request->techId)
            ],
            'address' => 'required|min:5'
        ], [
            'techId.unique' => 'Technology has already been taken',
        ]);
        $technology = IptbmTechnologyProfile::find($request->techId);
        $technology->extension()->save(new IptbmExtensionPathway([
            'adoptor_name' => $request['adopter'],
            'address' => $request['address']
        ]));
        return redirect()->back();
    }


}
