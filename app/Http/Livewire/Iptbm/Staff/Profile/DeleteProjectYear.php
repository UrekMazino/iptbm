<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\iptbm\IptbmProjectYearBudget;
use Livewire\Component;

class DeleteProjectYear extends Component
{

    public $projectYear;
    public $project;

    public function deleteData(IptbmProjectYearBudget $project)
    {

        $project->delete();
        $this->emit('reloadPage');

    }

    public function mount($project, $projectYear)
    {
        $this->projectYear = $projectYear;
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.profile.delete-project-year');
    }
}
