<?php

namespace App\Http\Livewire\Iptbm\Admin\Trademark;

use App\Models\iptbm\IptbmIpAlert;
use Livewire\Component;

class TradeMark extends Component
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
                $query->where('name','Trademark/Service Mark');
            })
            ->get();
    }
    public function render()
    {
        return view('livewire.iptbm.admin.trademark.trade-mark')
            ->extends('layouts.iptbm.admin');
    }
}
