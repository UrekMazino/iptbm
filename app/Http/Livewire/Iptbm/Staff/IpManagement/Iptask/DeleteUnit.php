<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement\Iptask;

use Livewire\Component;

class DeleteUnit extends Component
{

    public $unit;

    public function mount($unit)
    {
        $this->unit = $unit;
    }

    public function deleteUInit()
    {
        $this->unit->delete();
        $this->emit('reloadPage');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.iptask.delete-unit');
    }
}
