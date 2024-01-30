<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IptbmProfiles extends Component
{

    public $iptbmProfiles;


    public function mount()
    {
        $this->iptbmProfiles = IptbmProfile::with(['agency'=>function ($query) {
            $query->where('iptbm_region_id',Auth::user()->profile->agency->region->id);
        },'agency.region'])->get();


    }

    public function render()
    {
        return view('livewire.iptbm.dashboard.iptbm-profiles');
    }
}
