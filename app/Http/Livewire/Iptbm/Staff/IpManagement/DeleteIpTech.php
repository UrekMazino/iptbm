<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use Livewire\Component;

class DeleteIpTech extends Component
{

    public $ipAlert;

    public function mount($ipAlert)
    {

        $this->ipAlert = $ipAlert;
    }

    public function deleteIp()
    {
        $this->ipAlert->delete();
        $this->emit('reloadPage');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.delete-ip-tech');
    }
}
