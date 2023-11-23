<?php

namespace App\Http\Livewire\Iptbm\Admin\Component;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class IpAlertNav extends Component
{

    public $route;

    public function mount()
    {
        $this->route = Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.iptbm.admin.component.ip-alert-nav');
    }
}
