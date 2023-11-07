<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Fulltechdescription;

use Livewire\Component;

class TechnologyAdoptor extends Component
{
    public $techAdoptor;
    public function mount($techAdoptor)
    {
        $this->adoptor = $techAdoptor;
    }

    public function deleteAdoptor()
    {
        $this->techAdoptor->delete();
        $this->emit('updateAdoptor');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.fulltechdescription.technology-adoptor');
    }
}
