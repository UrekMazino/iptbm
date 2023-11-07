<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use Livewire\Component;

class AgentContact extends Component
{
    public $contact;
    public function mount($contact)
    {

        $this->contact = $contact;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.agent-contact');
    }
}
