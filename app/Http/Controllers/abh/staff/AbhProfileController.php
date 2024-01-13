<?php

namespace App\Http\Controllers\abh\staff;

use App\Http\Controllers\Controller;
use App\Models\abh\AbhProfile;
use App\Models\abh\AbhProject;
use Illuminate\Support\Facades\Auth;

class AbhProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = Auth::user()->abh_profile;
        return view('abh.profile.index', compact('profile'));
    }



    public function view_project(AbhProject $project)
    {
        $this->authorize('view',$project);

        return view('abh.profile.profile-project',compact('project'));

    }

    public function delete(AbhProject $project)
    {

        $project->delete();
        return redirect()->route("abh.staff.profile");
    }

    public function view_all_profile()
    {
        $profile=AbhProfile::with('agency.region')
            ->whereHas('agency.region',function ($query){
                $query->where('id',Auth::user()->abh_profile->agency->region->id);
            })->get();

        return view('abh.profile.all-profile',compact('profile'));
    }

    public function all_profile_public_view(AbhProfile $profile)
    {
        return view('abh.profile.profile-public-view',compact('profile'));
    }

    public function all_projects(AbhProfile $profile)
    {
        $profile->load('projects');

        return view('abh.profile.all-profile-projects',[
            'projects' => $profile->projects
        ]);
    }

}
