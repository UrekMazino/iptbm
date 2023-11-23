<?php

namespace App\View\Components\iptbm;

use App\Models\iptbm\IptbmIpAlertTask;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StagesComponent extends Component
{
    private mixed $taskId;
    private mixed $ipAlertId;
    private mixed $taskGroupName;

    /**
     * Create a new component instance.
     */
    public function __construct($ipAlertId, $taskGroupName)
    {

        $this->ipAlertId = $ipAlertId;
        $this->taskGroupName = $taskGroupName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tasks = IptbmIpAlertTask::with("stage", "task_deadline")
            ->where('ip_alert_id', $this->ipAlertId)
            ->where('task_group_name', $this->taskGroupName)->get();
        return view('components.iptbm.stages-component', compact('tasks'));
    }
}
