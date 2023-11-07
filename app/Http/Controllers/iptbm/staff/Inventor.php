<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmInventor;
use App\Models\iptbm\IptbmInventorContact;
use App\Models\iptbm\IptbmInventorExpertise;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Inventor extends Controller
{
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
        $agencies=IptbmAgency::all();
        $inventors=IptbmInventor::with("agency_name","latest_agency_affiliation","technologies","technologies.technology","contacts")
            ->whereHas("agency_name",function ($query){
                $query->where("id",Auth::user()->profile->agency->id);
            })
            ->get();
        return view('iptbm.staff.inventor.index',[
            'agencies' => $agencies,
            'inventors'=>$inventors
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'inventor_name' =>'required|unique:iptbm_inventors,name',
            'inventor_status' =>'required',
            'inventor_address'=>'required',
            'inventor_agency' =>'required',
        ]);
        IptbmInventor::create([
            'name' => $request->inventor_name,
            'address' => $request->inventor_address,
            'agency' =>$request->inventor_agency,
            'status' =>$request->inventor_status
        ]);
        return redirect()->back()->with('inventor-success', 'Inventor saved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id): RedirectResponse
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(IptbmInventor $id): Application|Factory|View

    {
        $id->load("expertise","agency_name","contacts","latest_agency_affiliation");

        return view("iptbm.staff.inventor.profile",[
            'inventor'=>$id
        ]);
    }

    public function add_tel(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'tel_number'=>[
                'required',
                Rule::unique(IptbmInventorContact::class,'contact')
                ->where('iptbm_inventor_id',$id)
            ]
        ],[
            'tel_number.required'=>'Telephone number is empty.',
            'tel_number.unique'=>'Telephone number exists..!'
        ]);
        $inventor=IptbmInventor::find($id);
        $inventor->contacts()->saveMany([
            new IptbmInventorContact([
                'type'=>'phone',
                'contact'=>$request->tel_number
            ])
        ]);
        return redirect()->back()->with('inventor-add-tel-success', 'Number saved successfully.');
    }

    public function add_mob(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'mob_number'=>[
                'required',
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$id)
            ]
        ],[
            'mob_number.required'=>'Mobile number is empty.',
            'mob_number.unique'=>'Mobile number exists..!'
        ]);
        $inventor=IptbmInventor::find($id);
        $inventor->contacts()->saveMany([
            new IptbmInventorContact([
                'type'=>'mobile',
                'contact'=>$request->mob_number
            ])
        ]);
        return redirect()->back()->with('inventor-add-mob-success', 'Number saved successfully.');
    }

    public function add_fax(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'fax_number'=>[
                'required',
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$id)
            ]
        ],[
            'fax_number.required'=>'Mobile number is empty.',
            'fax_number.unique'=>'Mobile number exists..!'
        ]);
        $inventor=IptbmInventor::find($id);
        $inventor->contacts()->saveMany([
            new IptbmInventorContact([
                'type'=>'fax',
                'contact'=>$request->fax_number
            ])
        ]);
        return redirect()->back()->with('inventor-add-fax-success', 'Number saved successfully.');
    }

    public function add_eml(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'eml_number'=>[
                'required',
                'email',
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$id)
            ]
        ],[
            'eml_number.required'=>'Email address is empty.',
            'eml_number.unique'=>'Email Address exists..!',
            'eml_number.email'=>'Please provide a valid email address.'
        ]);
        $inventor=IptbmInventor::find($id);
        $inventor->contacts()->saveMany([
            new IptbmInventorContact([
                'type'=>'email',
                'contact'=>$request->eml_number
            ])
        ]);
        return redirect()->back()->with('inventor-add-emlsuccess', 'Email saved successfully.');
    }

    public function delcontact(Request $request): RedirectResponse
    {
        $request->validate([
            'contact_id' =>'required'
        ]);
        IptbmInventorContact::find($request->contact_id)->delete();
        return redirect()->back()->with('inventor-del-contact-success', 'Success..!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    public function add_expertise(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'inventor_exp'=>[
                'required',
                Rule::unique(IptbmInventorExpertise::class,'field')
                ->where("iptbm_inventor_id",$id)
            ]
        ],[
            'inventor_exp.unique'=>'Details already exists',
            'inventor_exp.required'=>'Field is empty..!',
        ]);

        $inventor=IptbmInventor::find($id);
        $inventor->expertise()->saveMany([
            new IptbmInventorExpertise([
                'field'=>$request->inventor_exp
            ])
        ]);

        return redirect()->back()->with('inventor-exp-success', 'Inventor saved successfully.');
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
    public function destroy(Request $request): RedirectResponse
    {

        IptbmInventor::find($request->inventor_id)->delete();
        return redirect()->back();
    }
}
