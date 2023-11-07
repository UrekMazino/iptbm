<?php

namespace App\View\Components\iptbm;

use App\Models\iptbm\IptbmIpTask;
use App\Models\iptbm\IptbmIpTaskStage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IpTaskComponent extends Component
{
    private mixed $taskId;
    private mixed $name;

    /**
     * Create a new component instance.
     */
    public function __construct($taskId,$name)
    {
        $this->taskId=$taskId;
        $this->name=$name;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $stages=IptbmIpTaskStage::where("ip_task_id",$this->taskId)->get();
        return view('components.iptbm.ip-task-component',[
            'stages'=>$stages,
            'name'=>$this->name
        ]);
    }
}
