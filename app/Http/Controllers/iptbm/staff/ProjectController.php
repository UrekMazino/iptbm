<?php

namespace App\Http\Controllers\iptbm\staff;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmProject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        /**
         * id of iptbm profile
         */


        return view('iptbm.staff.other.add-project');
    }
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|max:255|unique:iptbm_projects,project_name',
            'project_leader'=>'required|max:255',
            'dateperiod'=>'required|date_format:Y-m-d'
        ]);

        $profile=IptbmProfile::where('agency_id', Auth::user()->profile->agency->id)->first();
        $profile->projects()->saveMany([
            new IptbmProject([
                'project_leader'=>$request['project_leader'],
                'project_name'=>$request['project_name'],
                'implementation_period'=>$request['dateperiod']
            ]),
        ]);

        return redirect()->back()->with('success','Project added Successfully');
    }

    public function edit($id = null): View|Factory|Application|RedirectResponse
    {
        /**
         * id of iptbm profile
         */

        $project=IptbmProject::with('projectDetails')->find($id);
        if(!$project){
           return redirect()->route("iptbm.staff.ipProfile")->with('error','Project not found');
        }

        return view('iptbm.staff.other.project-view',[
            'project'=>$project,
            'id'=>$id,
        ]);
    }
    public function update(Request $request,$id,string $name): View|Factory|Application|RedirectResponse
    {
        if($name==='project_leader'){
            $request->validate([
                'project_leader' => 'required|max:255',
            ]);
            $project=IptbmProject::find($id);
            $project->project_leader=$request['project_leader'];
            $project->save();
            return redirect()->back()->with('success-projLead','Project updated Successfully');
        }

        if($name==='implementation_period'){
            $request->validate([
                'implementation_period' => 'required|date_format:Y-m-d'
            ]);
            $project=IptbmProject::find($id);
            $project->implementation_period=$request['implementation_period'];
            $project->save();
            return redirect()->back()->with('success-impDate','Project updated Successfully');
        }
        if($name==='update_implementation_period'){
            $request->validate([
                'update_implementation_period' => 'required|date_format:Y-m-d'
            ]);
            $project=IptbmProject::find($id);
            $project->update_implementation_period=$request['update_implementation_period'];
            $project->save();
            return redirect()->back()->with('success-chngeDate','Project updated Successfully');
        }
        if($name==='total_budget'){
            $request->validate([
                'total_budget' => 'required|numeric',
            ]);
            $project=IptbmProject::find($id);
            $project->total_budget=$request['total_budget'];
            $project->save();
            return redirect()->back()->with('success-projLeadtotalBud','Project updated Successfully');
        }
        if($name==='year_1_budget'){
            $request->validate([
                'year_1_budget' => 'required|numeric',
            ]);
            $project=IptbmProject::find($id);
            $project->year_1_budget=$request['year_1_budget'];
            $project->save();
            return redirect()->back()->with('success-y1-bud','Project updated Successfully');
        }
        if($name==='year_2_budget'){
            $request->validate([
                'year_2_budget' => 'required|numeric',
            ]);
            $project=IptbmProject::find($id);
            $project->year_2_budget=$request['year_2_budget'];
            $project->save();
            return redirect()->back()->with('success-y2-bud','Project updated Successfully');
        }

        return view('iptbm.staff.other.project-view');

    }
    function delete($id)
    {
        $project=IptbmProject::find($id);
        $project->delete();
        return redirect()->route('iptbm.staff.ipProfile')->with('success-proj-del','Project deleted Successfully');
    }
}
