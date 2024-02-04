<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IptbmProfiles extends Component
{




    public function mount()
    {


    }

    public function render()
    {
        $regions=IptbmRegion::with('iptbms')->where('id',Auth::user()->profile->agency->region->id)->first();

        return view('livewire.iptbm.dashboard.iptbm-profiles')->with([
            'iptbmProfiles'=>$regions
        ]);
    }
}
