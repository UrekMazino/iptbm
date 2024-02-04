<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IptbmProfiles extends Component
{

    public $iptbmProfiles;


    public function mount()
    {
        $this->iptbmProfiles=IptbmRegion::with('iptbms')->where('id',Auth::user()->profile->agency->region->id)->get();

    }

    public function render()
    {
        return view('livewire.iptbm.dashboard.iptbm-profiles');
    }
}
