<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Livewire\Component;

class DeleteProjectYear extends Component
{

    public $projectYear;
    public $project;

    public function deleteData()
    {

       $proj= $this->project->projectDetails()->latest()->skip(1)->take(1)->first();
       $proj->extendable=true;
       $proj->save();
        $this->projectYear->delete();
        $this->emit('reloadPage');

    }

    public function mount($project,$projectYear)
    {
        $this->projectYear = $projectYear;
        $this->project = $project;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.profile.delete-project-year');
    }
}
