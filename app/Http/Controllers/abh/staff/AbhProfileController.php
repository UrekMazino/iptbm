<?php

namespace App\Http\Controllers\abh\staff;

use App\Http\Controllers\Controller;
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

}
