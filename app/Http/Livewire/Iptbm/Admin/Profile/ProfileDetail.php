<?php

namespace App\Http\Livewire\Iptbm\Admin\Profile;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ProfileDetail extends Component
{
    public $profile;

    public function mount($profile): void
    {
        $this->profile=$profile;
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.admin.profile.profile-detail');
    }
}
