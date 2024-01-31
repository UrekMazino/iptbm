<?php

namespace App\Http\Livewire\Iptbm\AdminDashboard;

use App\Models\iptbm\IptbmTechnologyProfile;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class TotalTech extends Component
{

    public $technologies;

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->technologies = IptbmTechnologyProfile::latest()->get();
        return view('livewire.iptbm.admin-dashboard.total-tech')->with([
            'technologies' => $this->technologies
        ]);
    }
}
