<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement\Iptask;

use Livewire\Component;

class DeletePersonel extends Component
{
    public $personel;

    public function deletePerson()
    {
        $this->personel->delete();
        $this->emit('reloadPage');
    }

    public function mount($personel)
    {
        $this->personel = $personel;
    }


    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.iptask.delete-personel');
    }
}
