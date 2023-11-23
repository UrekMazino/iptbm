<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmDeploymentPathway;
use Livewire\Component;

class DeploymentCount extends Component
{
    public $deployment;
    public $count;
    public $technology;

    public function mount($technologyId)
    {

        /*
         *  $this->fill([
             'deployment' => $deployment,
             'count' => $this->deployment->count()
         ]);
         */
        $this->technology = $technologyId;
    }

    public function render()
    {
        $this->deployment = IptbmDeploymentPathway::latest()->limit(5)->where('technology_id', $this->technology)->get();
        return view('livewire.iptbm.staff.technology.deployment-count');
    }
}
