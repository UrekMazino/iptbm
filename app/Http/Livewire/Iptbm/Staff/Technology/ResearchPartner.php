<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use Livewire\Component;

class ResearchPartner extends Component
{
    public $partner;

    public function deletePartner()
    {
        $this->partner->delete();
        $this->emit('reloadPage');
    }

    public function mount($partner)
    {
        $this->partner = $partner;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.technology.research-partner');
    }
}
