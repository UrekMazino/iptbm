<?php

namespace App\Http\Controllers\abh\staff;

use App\Http\Controllers\Controller;
use App\Models\abh\AbhTechnologyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbhTechController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

        $technologies=AbhTechnologyProfile::with('profile')->where('abh_profile_id',Auth::user()->abh_profile->id)->get();
        $profile=Auth::user()->abh_profile;

        return view('abh.technology.index',compact('technologies','profile'));
    }

    public function view_tech(AbhTechnologyProfile $technology)
    {

        $technology->load('co_owner');
        return view('abh.technology.view-tech',compact('technology'));
    }

    public function view_image(AbhTechnologyProfile $technology)
    {
        return view('abh.image-viewer',compact('technology'));
    }


}
