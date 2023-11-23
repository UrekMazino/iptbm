<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use Livewire\Component;

class TechTransPathway extends Component
{
    public $technology;

    public function mount($technology)
    {
        $this->technology = $technology;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.tech-trans-pathway');
    }
}
