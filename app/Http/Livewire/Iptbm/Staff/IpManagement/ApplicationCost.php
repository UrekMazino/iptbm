<?php

namespace App\Http\Livewire\Iptbm\Staff\IpManagement;

use Livewire\Component;

class ApplicationCost extends Component
{

    public $palert;

    public $descriptionModel;
    public $costModel;

    public $rules = [
        'descriptionModel' => 'required',
        'costModel' => 'required|numeric|min_digits:1'
    ];

    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function mount($ipalert)
    {
        $this->ipalert = $ipalert;

    }


    public function render()
    {
        return view('livewire.iptbm.staff.ip-management.application-cost');
    }
}
