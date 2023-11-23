<?php

namespace App\Http\Livewire\Iptbm\Staff\Deployment;

use Livewire\Component;

class DeleteTechContact extends Component
{

    public $contact;

    public function deleteContact()
    {
        $this->contact->delete();
        $this->emit('loadData');
    }

    public function mount($contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.deployment.delete-tech-contact');
    }
}
