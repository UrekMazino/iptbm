<?php

namespace App\Http\Livewire\Iptbm\Admin\Iptbm;

use Livewire\Component;

class Navigation extends Component
{

    public $current;
    public $profile_id;

    public function mount($current, $profile_id): void
    {
        $this->current = $current;
        $this->profile_id = $profile_id;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.iptbm.navigation');
    }
}
