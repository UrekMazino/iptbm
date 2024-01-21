<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmIpAlertTask;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Calendar extends Component
{
    public $task;

    public function render()
    {

        $this->task = IptbmIpAlertTask::with('stage', 'ip_alert.technology.iptbmprofiles')->whereHas('ip_alert.technology.iptbmprofiles', function ($query) {
            $query->where('id', Auth::user()->profile->id);
        })->get()->toArray();


        foreach ($this->task as &$task) {
            $task['url'] = route("iptbm.staff.iptask.view", ['id' => $task['id']]);
        }


        return view('livewire.iptbm.dashboard.calendar')->with([
            'events' => $this->task
        ]);
    }
}
