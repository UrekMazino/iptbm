<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\User;
use Livewire\Component;

class IptbmProfileIcon extends Component
{
    public $profile;
    public $user;

    public function mount($profile)
    {
        $this->profile = $profile;
        $this->user = User::all();
    }

    public function render()
    {
        return view('livewire.iptbm.dashboard.iptbm-profile-icon');
    }
}
