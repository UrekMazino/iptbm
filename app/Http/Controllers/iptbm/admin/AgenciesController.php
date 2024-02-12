<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmRegion;
//use Google\Service\DomainsRDAP\Resource\Ip;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AgenciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $agencies = IptbmAgency::with('region',  'profiles.users')->latest()->get();
        return view('admin.iptbm.add-record.agencies', compact('agencies'));
    }

    public function agencies_ajax(): JsonResponse
    {
        $agency = IptbmAgency::with('region', 'head')->get();
        return response()->json([
            'data' => $agency
        ]);
    }

    public function add_agency_view(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $regions = IptbmRegion::all();

        return view("admin.iptbm.add-record.add-agency", compact('regions'));
    }

    public function add_agency(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'region_id' => [
                'required',
                Rule::exists(IptbmRegion::class, 'id')
            ],
            'agency_name' => [
                'required',
                'min:10',
                Rule::unique(IptbmAgency::class, 'name')
            ],
            'agency_address' => 'required|min:10',
            'agency_head' => 'required|min:10',
            'agency_head_designation' => 'required',
            'agency_email' => 'sometimes|nullable|email',
            'agency_mobile' => 'sometimes|nullable|numeric',
            'agency_fax' => 'sometimes|nullable|numeric',
            'agency_tel' => 'sometimes|nullable|numeric',
        ]);

        $region = IptbmRegion::find($request->region_id);
        $agency = new IptbmAgency([
            'name' => $request->agency_name,
            'address' => $request->agency_address
        ]);

        $heads = new AgencyHead([
            'head' => $request->agency_head,
            'designation' => $request->agency_head_designation,
            'email' => $request->agency_email,
            'mobile' => $request->agency_mobile,
            'fax' => $request->agency_fax,
            'tel' => $request->agency_tel
        ]);

        $region->agencies()->save($agency);
        $agency->head()->save($heads);
        return redirect()->back()->with('agency_stored', 'new agency save successfully..!');
    }


    public function view_agency(IptbmAgency $agency)
    {
        $agency->load( 'region', 'contacts', 'profiles.users');
        return view('admin.iptbm.add-record.view-agency', compact('agency'));
    }

}
