<?php

namespace App\Http\Livewire\Abh\Technology;

use Livewire\Component;

class TechnologyOwner extends Component
{
    public $technology;

    public function mount($technology)
    {
        $technology->load('profile.agency','co_owner');
        $this->technology=$technology;
    }
    public function render()
    {
        return view('livewire.abh.technology.technology-owner');
    }
}
