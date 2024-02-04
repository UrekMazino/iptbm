<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;


use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class TotalIptbm extends Component
{

    public $regions;
    public $total;

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->regions = IptbmRegion::with('iptbms')->latest()->get();
        $this->total = IptbmProfile::with('agency')
        ->whereHas('agency')->get();

        return view('livewire.iptbm.admin-dashboard.total-iptbm')->with([
            'profiles' => $this->regions,
            'total' => $this->total
        ]);
    }
}
