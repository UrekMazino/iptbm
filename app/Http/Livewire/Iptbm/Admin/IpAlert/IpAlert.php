<?php

namespace App\Http\Livewire\Iptbm\Admin\IpAlert;

use App\Models\iptbm\IptbmIpAlert;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use function Clue\StreamFilter\fun;

class IpAlert extends Component
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
                $query->where('name','Patent');
            })
            ->get();
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.admin.ip-alert.ip-alert')
            ->extends('layouts.iptbm.admin');
    }
}
