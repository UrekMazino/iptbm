<?php

namespace App\Http\Livewire\Iptbm\Staff\Deployment;

use Livewire\Component;

class DeleteDeployedTech extends Component
{
    public $technology;

    public function deleteItem()
    {
        $this->technology->delete();
        $this->emit('reloadPage');
    }

    public function mount($technology)
    {
        $this->technology = $technology;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.deployment.delete-deployed-tech');
    }
}
