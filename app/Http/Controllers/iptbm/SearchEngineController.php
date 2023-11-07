<?php

namespace App\Http\Controllers\iptbm;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIpAlertTask;
use Illuminate\Http\Request;

class SearchEngineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users=[];
        if($request->filled('search')){
            $users = IptbmIpAlertTask::search($request->search)->get();
        }

        return view('iptbm.search',[
            'search'=>$users,
        ]);
    }
}
