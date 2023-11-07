<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;

use App\Models\iptbm\IptbmTechnologyProfile;
use Livewire\Component;

class TotalTech extends Component
{

    public $technologies;
    public function render()
    {
        $this->technologies=IptbmTechnologyProfile::latest()->get();
        return view('livewire.iptbm.admin-dashboard.total-tech')->with([
            'technologies' => $this->technologies
        ]);
    }
}
