<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmIpAlertTask;
use Livewire\Component;

class TaskCollection extends Component
{
    public $alert;
    public $task;
    public $data;
    public function mount($alert)
    {

        $this->alert=$alert;
        $this->data=collect($alert->ip_task)->groupBy('task_group_name');



    }
    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.task-collection');
    }
}
