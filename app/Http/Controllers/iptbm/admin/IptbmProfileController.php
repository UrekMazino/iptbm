<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmProject;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class IptbmProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $profiles = IptbmProfile::all();
        return view('admin.iptbm.iptbm-profiles.index', compact('profiles'));
    }

    public function profile(IptbmProfile $profile)
    {
        return view('admin.iptbm.iptbm-profiles.view-profile', compact('profile'));
    }

    public function profileDetails($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = IptbmProfile::with('users', 'agency', 'agency.head', 'agency.region', 'contact', 'projects', 'technologies')->find($id);
        return view('admin.iptbm.iptbm-profiles.profile', ['profile' => $profile]);
    }

    public function profile_projects()
    {
        $projects = IptbmProject::all();
        return view('admin.iptbm.iptbm-profiles.profile-projects', compact('projects'));
    }

    public function project_view(IptbmProject $project)
    {
        return view('admin.iptbm.iptbm-profiles.project-view', compact('project'));
    }


    public function profileTechnology($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = IptbmProfile::with('users', 'agency', 'agency.head', 'agency.region', 'technologies', 'technologies.full_description')->find($id);
        return view('iptbm.admin.iptbm-profiles.technologies', ['profile' => $profile]);
    }

    public function profileList($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {

        $profile_per_region = IptbmProfile::with([
            'users',
            'agency',
            'agency.head',
            'agency.region',
            'contact',
            'projects',
            'technologies'
        ])
            ->has('agency.region')
            ->whereHas('agency.region', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->get();
        return view('iptbm.admin.iptbm-profiles.index', [
            'profile_per_region' => $profile_per_region
        ]);
    }


    public function listAjax(): JsonResponse
    {
        $profiles = IptbmProfile::with('users', 'agency', 'agency.head', 'agency.region', 'contact', 'projects', 'technologies')->get();

        return response()->json([
            'data' => $profiles
        ]);

    }
}
