<?php

namespace App\Http\Livewire\Iptbm\Staff\Extension;

use Livewire\Component;

class DeleteExtensionTech extends Component
{

    public $technology;

    public function deleteItem()
    {
        $this->technology->delete();
        $this->emit('reloadPage');
    }

    public function mount($technology)
    {
        $this->technology = $technology;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.extension.delete-extension-tech');
    }
}
