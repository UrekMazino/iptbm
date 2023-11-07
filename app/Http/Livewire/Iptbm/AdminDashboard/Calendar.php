<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;

use App\Models\iptbm\IptbmIpAlertTask;
use Livewire\Component;

class Calendar extends Component
{


    public $task;

    public function render()
    {
        $this->task = IptbmIpAlertTask::with('stage','ip_alert.technology')->get()->toArray();

        foreach ($this->task as &$task) {
            $task['url'] = route("iptbm.admin.ip-application-report.task-details", ['task' => $task['id']]);
        }



        return view('livewire.iptbm.admin-dashboard.calendar')->with([
            'task' => $this->task,
        ]);
    }
}
