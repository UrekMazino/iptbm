<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use Livewire\Component;

class TechOwnerDetail extends Component
{
    public $techowner;

    public function deleteOwner(): void
    {
        $this->techowner->delete();
        $this->emit('reloadPage');
    }
    public function mount($techowner)
    {
        $this->techowner = $techowner;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.technology.tech-owner-detail');
    }
}
