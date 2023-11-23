<?php

namespace App\Http\Livewire\Iptbm\Admin;

use App\Models\iptbm\IptbmIndustry;
use Livewire\Component;

class SideNavPopupIndustry extends Component
{
    public $industries;
    public $route;

    public function mount($route)
    {
        $this->industries = IptbmIndustry::all();
        $this->route = $route;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.side-nav-popup-industry');
    }
}
