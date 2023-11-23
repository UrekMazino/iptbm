<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmDeploymentPathway;
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

class DeploymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|View|Application
    {


        $deployedTechnologies = IptbmDeploymentPathway::with('technology')->get();
        $profile = IptbmProfile::with("technologies", "technologies.techgenerators", "technologies.techgenerators.inventor")->where("agency_id", Auth::user()->profile->agency->id)->first();


        return view('iptbm.staff.deployment.index', [
            'deployedTechnologies' => $deployedTechnologies,
            'profile' => $profile
        ]);
    }


    public function deploy_tech(Request $request): RedirectResponse
    {
        $request->validate([
            'techId' => [
                'required',
                new ValueExistsInTable([
                    'iptbm_extension_pathways' => 'technology_id',
                    'iptbm_ip_alerts' => 'technology_id',
                    'iptbm_commercialization_precoms' => 'technology_id',
                    'iptbm_commercialization_adopters' => 'technology_id',
                ], 'Technology', "Technology is currently under in different pathways.")
            ],
            'adopter' => [
                'required',
                Rule::unique(IptbmDeploymentPathway::class, 'adoptor_name')->where('technology_id', $request->techId)
            ],
            'address' => 'required'
        ], [
            'techId.required' => 'Technology is missing.',
        ]);
        $technology = IptbmTechnologyProfile::find($request->techId);
        $technology->deployment()->save(new IptbmDeploymentPathway([
            'adoptor_name' => $request->adopter,
            'address' => $request->address
        ]));
        return redirect()->back();
    }

    public function ajax_call(Request $request)
    {
        $data = IptbmDeploymentPathway::with('technology')->get();
        if ($request->ajax()) {
            return response()->json($data);
        }

    }

}


