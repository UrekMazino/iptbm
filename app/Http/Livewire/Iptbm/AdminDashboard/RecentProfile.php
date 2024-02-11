<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;

use App\Models\iptbm\IptbmProfile;
use Livewire\Component;

class RecentProfile extends Component
{

    public $profiles;

    public function render()
    {
        $this->profiles = IptbmProfile::whereHas('agency')->latest()->take(5)->get();
        return view('livewire.iptbm.admin-dashboard.recent-profile')->with([
            'profiles' => $this->profiles
        ]);
    }
}
