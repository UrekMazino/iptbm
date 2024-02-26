<?php

namespace App\Http\Livewire\Abh\Dashboard;

use App\Models\abh\AbhProfile;
use Livewire\Component;

class RecentProfile extends Component
{
    public function render()
    {

        return view('livewire.abh.dashboard.recent-profile')
            ->with([
                'profile' =>AbhProfile::latest()->take(5)->get()
            ]);
    }
}
