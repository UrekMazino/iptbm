<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmComercialAdopterContact;
use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Models\iptbm\IptbmDeploymentAdoptorContact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdoptedTechController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(IptbmCommercializationAdopter $id): Application|Factory|View|RedirectResponse
    {
        $tech = $id->load("technology", "contacts");

        return view('iptbm.staff.adopter.adopted_tech', [
            'tech' => $tech
        ]);
    }

/*
 *     public function update_details(Request $request, $id): RedirectResponse
    {


        $adopter = IptbmCommercializationAdopter::find($id);

        if (isset($request['company_name'])) {

            $request->validate([
                'company_name' => 'required|min:5'
            ]);
            $adopter->company_name = $request['company_name'];
            $adopter->save();
        }

        if (isset($request['address'])) {
            $request->validate([
                'address' => 'required|min:5'
            ]);
            $adopter->address = $request['address'];
            $adopter->save();
        }
        if (isset($request['company_description'])) {
            $request->validate([
                'company_description' => 'required|min:5'
            ]);
            $adopter->company_description = $request['company_description'];
            $adopter->save();
        }
        if (isset($request['business_structures'])) {
            $request->validate([
                'business_structures' => 'required'
            ]);
            $adopter->business_structures = $request['business_structures'];
            $adopter->save();
        }
        if (isset($request['business_registration'])) {
            $request->validate([
                'business_registration' => 'required'
            ]);
            $adopter->business_registration = $request['business_registration'];
            $adopter->save();
        }
        if (isset($request['acquisition_model'])) {
            $request->validate([
                'acquisition_model' => 'required'
            ]);
            $adopter->acquisition_model = $request['acquisition_model'];
            $adopter->save();
        }
        if (isset($request['for_incubation'])) {
            $request->validate([
                'for_incubation' => 'required|boolean'
            ]);
            $adopter->for_incubation = $request['for_incubation'];
            $adopter->save();
        }


        return redirect()->back();

    }

    public function add_contact(Request $request, $id): RedirectResponse
    {

        if ($request->contact_type === "mobile") {
            $request->validate([
                'contact' => [
                    'required',
                    'numeric',
                    'digits:11',
                    Rule::unique(IptbmComercialAdopterContact::class, 'contact')->where('commercial_adoptor_id', $id)
                ],
                'contact_type' => 'required:mobile',
            ]);
        }
        if ($request->contact_type === "phone") {
            $request->validate([
                'contact' => [
                    'required',
                    'numeric',
                    Rule::unique(IptbmComercialAdopterContact::class, 'contact')->where('commercial_adoptor_id', $id)
                ],
                'contact_type' => 'required:mobile',
            ]);
        }
        if ($request->contact_type === "fax") {
            $request->validate([
                'contact' => [
                    'required',
                    'numeric',
                    Rule::unique(IptbmComercialAdopterContact::class, 'contact')->where('commercial_adoptor_id', $id)
                ],
                'contact_type' => 'required:fax',
            ]);
        }
        if ($request->contact_type === "email") {
            $request->validate([
                'contact' => [
                    'required',
                    'email',
                    Rule::unique(IptbmComercialAdopterContact::class, 'contact')->where('commercial_adoptor_id', $id)
                ],
                'contact_type' => 'required:email',
            ]);
        }
        $depTech = IptbmCommercializationAdopter::find($id);
        $depTech->contacts()->saveMany([
            new IptbmComercialAdopterContact([
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
 */

}
