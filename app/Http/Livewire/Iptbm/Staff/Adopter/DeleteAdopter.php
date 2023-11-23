<?php

namespace App\Http\Livewire\Iptbm\Staff\Adopter;

use Livewire\Component;

class DeleteAdopter extends Component
{

    public $adopter;

    public function mount($adopter)
    {

        $this->adopter = $adopter;
    }

    public function deleteItem()
    {
        $this->adopter->delete();
        $this->emit('reloadPage');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.adopter.delete-adopter');
    }
}
