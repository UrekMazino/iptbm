<?php

namespace App\Http\Livewire\Abh\Admin;

use App\Models\abh\AbhTechCommodity;
use App\Models\abh\AbhTechIndustry;
use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {


        return view('livewire.abh.admin.side-bar');
    }
}
