<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement\Iptask;

use Livewire\Component;

class DeleteStage extends Component
{
    public $stage;
    public function mount($stage)
    {
        $this->stage = $stage;
    }

    public function deleteStage()
    {
        $this->stage->delete();
        $this->emit('reloadPage');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.iptask.delete-stage');
    }
}
