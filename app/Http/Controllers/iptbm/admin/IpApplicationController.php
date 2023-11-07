<?php

namespace App\Http\Controllers\iptbm\admin;

use App\Http\Controllers\Controller;
use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\iptbm\IpType;
use Illuminate\Http\Request;

class IpApplicationController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(IpType $iptype)// patent
    {

        $applications=IptbmIpAlert::all();

        return view('admin.iptbm.ip-application.index',[
            'applications'=>$applications->where('ip_type.name',$iptype->name),
            'ip_name'=>$iptype->name
        ]);
    }
    public function ip_task(IptbmIpAlert $task)

    {
        $stages=collect($task->ip_task->load('stage'))->groupBy('task_group_name');
        return view('admin.iptbm.ip-application.task',compact('task','stages'));
    }

    public function task_details(IptbmIpAlertTask $task)
    {
        return view('admin.iptbm.ip-application.task-details', compact('task'));
    }

}
