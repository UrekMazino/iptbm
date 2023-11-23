<?php

namespace App\Http\Livewire\Iptbm\Admin\Iptbm;

use Livewire\Component;

class Profiles extends Component
{
    public $profile;


    public function mount($profile): void
    {
        $this->profile = $profile;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.admin.iptbm.profiles');
    }
}
