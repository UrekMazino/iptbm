<?php

namespace App\Http\Controllers\abh;

use App\Http\Controllers\Controller;
use App\Models\abh\AbhTechnologyProfile;
use Illuminate\Http\Request;

class AbhImageViewer extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(AbhTechnologyProfile $technology)
    {
        return view('abh.image-viewer',compact('technology'));
    }
}
