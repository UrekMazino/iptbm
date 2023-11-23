<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;

use App\Models\iptbm\IptbmProfile;
use Livewire\Component;

class TotalTechProtocol extends Component
{
    public $profiles;

    public function render()
    {
        $this->profiles = IptbmProfile::all();
        return view('livewire.iptbm.admin-dashboard.total-tech-protocol')->with([
            'profiles' => $this->profiles
        ]);
    }
}
