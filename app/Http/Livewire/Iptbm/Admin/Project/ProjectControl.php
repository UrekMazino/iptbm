<?php

namespace App\Http\Livewire\Iptbm\Admin\Project;

use Livewire\Component;

class ProjectControl extends Component
{
    public $project;
    public function mount($project)
    {
        $this->project=$project;
    }
    public function render()
    {
        return view('livewire.iptbm.admin.project.project-control');
    }
}
