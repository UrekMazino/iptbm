<?php

namespace App\Http\Livewire\Iptbm\Staff\Adopter;

use Livewire\Component;

class Contact extends Component
{
    public $contact;

    public function deleteNumber()
    {
        $this->contact->delete();
        $this->emit('reloadPage');
    }

    public function mount($contact)
    {
        $this->contact = $contact;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.adopter.contact');
    }
}
