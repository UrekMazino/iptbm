<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;


use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Livewire\Component;

class TotalIptbm extends Component
{

    public $regions;
    public $total;
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->regions=IptbmRegion::latest()->get();
        $this->total=IptbmProfile::all();
        return view('livewire.iptbm.admin-dashboard.total-iptbm')->with([
            'profiles' => $this->regions,
            'total' => $this->total
        ]);
    }
}
