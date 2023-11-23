<?php

namespace App\Http\Livewire\Iptbm\Staff\Precom;

use Livewire\Component;

class DeletePrecom extends Component
{

    public $precom;

    public function mount($precom)
    {
        $this->precom = $precom;
    }

    public function DeletePrecom()
    {
        $this->precom->delete();
        $this->emit('reloadPage');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.precom.delete-precom');
    }
}
