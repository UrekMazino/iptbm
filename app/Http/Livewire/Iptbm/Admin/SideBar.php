<?php

namespace App\Http\Livewire\Iptbm\Admin;

use App\Models\iptbm\IpType;
use Livewire\Component;

class SideBar extends Component
{


    public function render()
    {
        return view('livewire.iptbm.admin.side-bar')->with([
            'nav'=>IpType::all()
        ]);
    }
}
