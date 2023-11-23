<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmDeploymentAdoptorContact;
use App\Models\iptbm\IptbmDeploymentPathway;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeployedTechController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IptbmDeploymentPathway $id): Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
    {
        $tech = $id->load("Technology", "contacts");

        if (!$tech) {
            return redirect()->route('iptbm.staff.deployment.index');
        }

        return view('iptbm.staff.deployment.deployed-tech', [
            "tech" => $tech
        ]);
    }

    public function add_contact(Request $request, $id): RedirectResponse
    {

        if ($request->contact_type === "mobile") {
            $request->validate([
                'contact' => [
                    'required',
                    'numeric',
                    'digits:11',
                    Rule::unique(IptbmDeploymentAdoptorContact::class, 'contact')->where('deployment_adopters_id', $id)
                ],
                'contact_type' => 'required:mobile',
            ]);
        }
        if ($request->contact_type === "phone") {
            $request->validate([
                'contact' => [
                    'required',
                    'numeric',
                    Rule::unique(IptbmDeploymentAdoptorContact::class, 'contact')->where('deployment_adopters_id', $id)
                ],
                'contact_type' => 'required:mobile',
            ]);
        }
        if ($request->contact_type === "fax") {
            $request->validate([
                'contact' => [
                    'required',
                    'numeric',
                    Rule::unique(IptbmDeploymentAdoptorContact::class, 'contact')->where('deployment_adopters_id', $id)
                ],
                'contact_type' => 'required:fax',
            ]);
        }
        if ($request->contact_type === "email") {
            $request->validate([
                'contact' => [
                    'required',
                    'email',
                    Rule::unique(IptbmDeploymentAdoptorContact::class, 'contact')->where('deployment_adopters_id', $id)
                ],
                'contact_type' => 'required',
            ]);
        }
        $depTech = IptbmDeploymentPathway::find($id);

        $depTech->contacts()->saveMany([
            new IptbmDeploymentAdoptorContact([
                'type' => $request->contact_type,
                'contact' => $request->contact
            ])
        ]);
        return redirect()->back();
    }

    public function delete_contact(Request $request): RedirectResponse
    {
        $request->validate([
            'adopId' => 'required'
        ]);

        IptbmDeploymentAdoptorContact::find($request->adopId)->delete();
        return redirect()->back();
    }
}
