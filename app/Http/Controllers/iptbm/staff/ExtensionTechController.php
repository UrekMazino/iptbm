<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmDeploymentAdoptorContact;
use App\Models\iptbm\IptbmDeploymentPathway;
use App\Models\iptbm\IptbmExtensionAdoptorContact;
use App\Models\iptbm\IptbmExtensionPathway;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExtensionTechController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id): Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
    {
        $tech=IptbmExtensionPathway::with("technology","contacts")->find($id);
        if(!$tech)
        {
            return redirect()->route('iptbm.staff.extension.index');
        }
        return view('iptbm.staff.extension.extension-tech',[
            'tech'=>$tech
        ]);
    }
    public function add_contact(Request $request, $id): RedirectResponse
    {

        if($request->contact_type==="mobile")
        {
            $request->validate([
                'contact'=>[
                    'required',
                    'numeric',
                    'digits:11',
                    Rule::unique(IptbmExtensionAdoptorContact::class, 'contact')->where('extension_adoptor_id',$id)
                ],
                'contact_type'=>'required:mobile',
            ]);
        }
        if($request->contact_type==="phone")
        {
            $request->validate([
                'contact'=>[
                    'required',
                    'numeric',
                    Rule::unique(IptbmExtensionAdoptorContact::class, 'contact')->where('extension_adoptor_id',$id)
                ],
                'contact_type'=>'required:mobile',
            ]);
        }
        if($request->contact_type==="fax")
        {
            $request->validate([
                'contact'=>[
                    'required',
                    'numeric',
                    Rule::unique(IptbmExtensionAdoptorContact::class, 'contact')->where('extension_adoptor_id',$id)
                ],
                'contact_type'=>'required:fax',
            ]);
        }
        if($request->contact_type==="email")
        {
            $request->validate([
                'contact'=>[
                    'required',
                    'email',
                    Rule::unique(IptbmExtensionAdoptorContact::class, 'contact')->where('extension_adoptor_id',$id)
                ],
                'contact_type'=>'required:email',
            ]);
        }
        $depTech=IptbmExtensionPathway::find($id);
        $depTech->contacts()->saveMany([
            new IptbmExtensionAdoptorContact([
                'type' => $request->contact_type,
                'contact'=>$request->contact
            ])
        ]);
        return redirect()->back();
    }

    public function delete_contact(Request $request): RedirectResponse
    {
        $request->validate([
            'adopId'=>'required'
        ]);

        IptbmExtensionAdoptorContact::find($request->adopId)->delete();
        return redirect()->back();
    }
}
