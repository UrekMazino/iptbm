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
        $technologies=AbhTechnologyProfile::with('profile')->where('abh_profiles_id',Auth::user()->abh_profile->id)->get();
        $profile=Auth::user()->abh_profile;

        return view('abh.technology.index',compact('technologies','profile'));
    }

}
