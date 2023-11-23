<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use Livewire\Component;

class DeleteTechnology extends Component
{

    public $technology;

    public function mount($technology)
    {
        $this->technology = $technology;
    }

    public function deleteTechnology()
    {
        $this->technology->delete();
        $this->emit('reloadPage');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.delete-technology');
    }
}
