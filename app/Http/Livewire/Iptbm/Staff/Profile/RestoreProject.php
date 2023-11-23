<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Carbon\Carbon;
use Livewire\Component;

class RestoreProject extends Component
{
    public $project;
    public $complete;

    public function RestoreProject()
    {
        $this->project->restore();
        $this->emit('reloadPage');
    }

    public function mount($project)
    {
        $this->project = $project;
        $this->complete = Carbon::parse($project->deleted_at)->addDay(3)->format('F-d-Y');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.profile.restore-project');
    }
}
