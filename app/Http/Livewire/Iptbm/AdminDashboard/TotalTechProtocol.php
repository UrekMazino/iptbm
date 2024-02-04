<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;

use App\Models\iptbm\IptbmProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TotalTechProtocol extends Component
{
    public $profiles;

    public function render()
    {
        $this->profiles = IptbmProfile::with('agency.region')->where('techno_transfer', '1')->get();
        return view('livewire.iptbm.admin-dashboard.total-tech-protocol')->with([
            'profiles' => $this->profiles
        ]);
    }
}
