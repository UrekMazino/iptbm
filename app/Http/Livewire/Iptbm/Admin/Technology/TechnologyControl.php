<?php

namespace App\Http\Livewire\Iptbm\Admin\Technology;

use Livewire\Component;

class TechnologyControl extends Component
{
    public $technology;

    public function delete()
    {
        $this->technology->delete();
    }

    public function mount($technology)
    {
        $this->technology = $technology;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.technology.technology-control');
    }
}
