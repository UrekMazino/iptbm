<?php

namespace App\View\Components\iptbm;

use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmIpAlertTask;
use App\Models\iptbm\IptbmIpTask;
use App\Models\iptbm\IptbmIpTaskStage;
use App\Models\iptbm\IpType;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use stdClass;

class DeadlineIpALert extends Component
{
    private mixed $ip_type_id;

    /**
     * Create a new component instance.
     */
    public function __construct($iptypeid=null)
    {
        $this->ip_type_id=$iptypeid;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

     //   $ip_type=IptbmIpAlert::with('ip_task','ip_task.stage','ip_task.ip_task_stage_notifications')->where('ip_type_id',$this->ip_type_id)->get();
        $ip_type=IpType::with([
            'tasks',
            'tasks.stages',
            'tasks.stages.applications',
            'tasks.stages.applications.ip_task_stage_notifications'
        ])->get();
 //       $stages=IptbmIpTask::with('stages','stages.applications')->get();

        return view('components.iptbm.deadline-ip-a-lert',[
            'tasks' => $ip_type,
        ]);
    }
}
