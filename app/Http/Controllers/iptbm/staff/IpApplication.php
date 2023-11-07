<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmPatentAgent;
use App\Models\iptbm\IptbmPatentAgentContact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class IpApplication extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,IptbmIpAlert $id): Application|Factory|View|RedirectResponse
    {

        $ip_alert=$id->load("technology","ip_type","patent_agent","protectionStatus","expenses");


        return view('iptbm.staff.ipmanagement.ip-type-application',[
            'ip_alert'=>$ip_alert
        ]);
    }

    /**
     * It updates the protection status of an IP alert.
     *
     * @param Request request The request object.
     * @param id The id of the record you want to update.
     *
     * @return RedirectResponse A redirect response to the previous page.
     */
    public function update_protect_status(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'protect_stat'=>'required',
        ]);

        $ip_alert=IptbmIpAlert::find($id);
        $ip_alert->protection_status=$request->protect_stat;
        $ip_alert->save();
        return redirect()->back();
    }

    /**
     * It updates the abstract of the ip alert.
     *
     * @param Request request The request object.
     * @param id The id of the record you want to update.
     *
     * @return RedirectResponse A redirect response to the previous page with a success message.
     */
    public function update_abstract(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'abstract'=>'required',
        ]);
        $ip_alert=IptbmIpAlert::find($id);
        $ip_alert->abstract=$request->abstract;
        $ip_alert->save();
        return redirect()->back()->with('abstract-update','Success...!');
    }

    public function add_agent(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'agent_name'=>[
                'required',
                Rule::unique(IptbmPatentAgent::class,"name")
                ->where("ip_alert_id",$id)
            ],
            'agent_address'=>'required'
        ]);

        $ip_alert=IptbmIpAlert::find($id);
        $ip_alert->patent_agent()->saveMany([
            new IptbmPatentAgent([
                'name'=>$request->agent_name,
                'address'=>$request->agent_address
            ])
        ]);

        return  redirect()->back()->with("add_agent_success","Agent added successfully..!");
    }


    public function delete_agent(Request $request): RedirectResponse
    {
        $request->validate([
            'delPatentAgent'=>'required',
        ]);
        IptbmPatentAgent::find($request->delPatentAgent)->delete();
        return redirect()->back()->with("delete-agent-success","Agent deleted successfully");
    }

    /* Validating the phone number and adding it to the database. */
    public function add_phone(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'phone'=>[
                'required',
                Rule::unique(IptbmPatentAgentContact::class,'contact')
                ->where('patent_agent_id',$id)
            ]
        ]);

        $agent= IptbmPatentAgent::find($id);
        $agent->agent_contact()->saveMany([
            new IptbmPatentAgentContact([
                'type'=>'phone',
                'contact'=>$request->phone
            ])
        ]);

        return redirect()->back()->with("add_phone_success","Phone number added successfully...!");
    }


    public function add_mobile(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'mobile'=>[
                'required',
                Rule::unique(IptbmPatentAgentContact::class,'contact')
                    ->where('patent_agent_id',$id)
            ]
        ]);

        $agent= IptbmPatentAgent::find($id);
        $agent->agent_contact()->saveMany([
            new IptbmPatentAgentContact([
                'type'=>'mobile',
                'contact'=>$request->mobile
            ])
        ]);

        return redirect()->back()->with("add_mobile_success","mobile number added successfully...!");
    }
    public function add_fax(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'fax'=>[
                'required',
                Rule::unique(IptbmPatentAgentContact::class,'contact')
                    ->where('patent_agent_id',$id)
            ]
        ]);

        $agent= IptbmPatentAgent::find($id);
        $agent->agent_contact()->saveMany([
            new IptbmPatentAgentContact([
                'type'=>'fax',
                'contact'=>$request->fax
            ])
        ]);

        return redirect()->back()->with("add_fax_success","mobile fax added successfully...!");
    }
    public function add_email(Request $request,$id): RedirectResponse
    {
        $request->validate([
            'email'=>[
                'required',
                Rule::unique(IptbmPatentAgentContact::class,'contact')
                    ->where('patent_agent_id',$id)
            ]
        ]);

        $agent= IptbmPatentAgent::find($id);
        $agent->agent_contact()->saveMany([
            new IptbmPatentAgentContact([
                'type'=>'email',
                'contact'=>$request->email
            ])
        ]);

        return redirect()->back()->with("add_email_success","mobile email added successfully...!");
    }




    public function delete_phone()
    {

    }
    public function delete_mobile()
    {

    }
    public function delete_fax()
    {

    }
    public function delete_email()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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
