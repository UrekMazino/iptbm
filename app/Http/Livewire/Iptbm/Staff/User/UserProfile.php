<?php

namespace App\Http\Livewire\Iptbm\Staff\User;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;
    public function mount()
    {
        $this->user = User::with('profile','profile.agency')->find(\Auth::user()->id);
    }
    public function render()
    {
        return view('livewire.iptbm.staff.user.user-profile');
    }
}
