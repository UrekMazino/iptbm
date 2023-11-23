<?php

namespace App\Http\Livewire\Iptbm\Admin\Copyright;

use App\Models\iptbm\IptbmIpAlert;
use Livewire\Component;

class CopyRight extends Component
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
                $query->where('name', 'Copyright & Related Rights');
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.iptbm.admin.copyright.copy-right')
            ->extends('layouts.iptbm.admin');
    }
}
