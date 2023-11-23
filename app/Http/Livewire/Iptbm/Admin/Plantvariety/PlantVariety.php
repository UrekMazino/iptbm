<?php

namespace App\Http\Livewire\Iptbm\Admin\Plantvariety;

use App\Models\iptbm\IptbmIpAlert;
use Livewire\Component;

class PlantVariety extends Component
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
                $query->where('name', 'Plant Variety Protection');
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.iptbm.admin.plantvariety.plant-variety')
            ->extends('layouts.iptbm.admin');
    }
}
