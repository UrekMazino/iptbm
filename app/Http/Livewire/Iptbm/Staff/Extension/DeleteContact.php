<?php

namespace App\Http\Livewire\Iptbm\Staff\Extension;

use Livewire\Component;

class DeleteContact extends Component
{

    public $contact;

    public function deleteContact()
    {
        $this->contact->delete();
        $this->emit('loadData');
    }

    public function mount($contact)
    {
        $this->contact=$contact;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.extension.delete-contact');
    }
}
