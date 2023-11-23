<?php

namespace App\Http\Livewire\Iptbm\Staff\Inventor;

use Livewire\Component;

class DeleteInventorPopup extends Component
{
    public $inventor;

    public function mount($inventor)
    {
        $this->inventor = $inventor;
    }

    public function deleteRecord()
    {
        $this->inventor->delete();
        return redirect()->route('iptbm.staff.inventor');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.inventor.delete-inventor-popup');
    }
}
