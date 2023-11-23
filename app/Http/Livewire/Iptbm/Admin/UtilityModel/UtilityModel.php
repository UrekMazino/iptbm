<?php

namespace App\Http\Livewire\Iptbm\Admin\UtilityModel;

use App\Models\iptbm\IptbmIpAlert;
use Livewire\Component;

class UtilityModel extends Component
{
    public $ipAlert;

    public function mount()
    {
        $this->ipAlert = IptbmIpAlert::with(
            [

                'technology',
                'protectionStatus',
                'patent_agent',
                'ip_task',
                'ip_type',
            ])
            ->whereHas('ip_type', function ($query) {
                $query->where('name', 'Utility Model');
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.iptbm.admin.utility-model.utility-model')
            ->extends('layouts.iptbm.admin');
    }
}
