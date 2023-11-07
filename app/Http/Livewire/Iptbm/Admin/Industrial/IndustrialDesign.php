<?php

namespace App\Http\Livewire\Iptbm\Admin\Industrial;

use App\Models\iptbm\IptbmIpAlert;
use Livewire\Component;

class IndustrialDesign extends Component
{
    public $ipAlert;

    public function mount()
    {
        $this->ipAlert=IptbmIpAlert::with(
            [

                'technology',
                'protectionStatus',
                'patent_agent',
                'ip_task',
                'ip_type',
            ])
            ->whereHas('ip_type',function($query){
                $query->where('name','Industrial Design');
            })
            ->get();
    }
    public function render()
    {
        return view('livewire.iptbm.admin.industrial.industrial-design')
            ->extends('layouts.iptbm.admin');
    }
}
