<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\User;
use Auth;
use Livewire\Component;

class UserAccount extends Component
{
    public $profile;

    public function disable_account(User $user)
    {
        $user->delete();
        $this->emit('reloadPage');
    }
    public function mount($profile): void
    {
        $this->profile = $profile->load(['users'=>function ($user){
             $user->whereNotIn('id', [Auth::user()->id]);
        }]);
    }
    public function render()
    {
        return view('livewire.iptbm.staff.profile.user-account');
    }
}
