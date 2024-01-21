<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\abh\AbhProfileResource;
use App\Models\abh\AbhProfile;
use Illuminate\Http\Request;

class AbhApi extends Controller
{
    public function abh_profile()
    {

        return new AbhProfileResource(AbhProfile::all());
    }
}
