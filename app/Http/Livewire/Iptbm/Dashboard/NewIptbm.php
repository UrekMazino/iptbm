<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmProfile;
use Carbon\Carbon;
use Livewire\Component;

class NewIptbm extends Component
{

    public $iptbmProfile;
    public function mount()
    {
        $this->iptbmProfile=IptbmProfile::latest()->take(5)->get();
    }
    public function render()
    {
        return view('livewire.iptbm.dashboard.new-iptbm');
    }
}
