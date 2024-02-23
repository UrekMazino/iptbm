<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Technologies;

use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhTechnology extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.technologies.abh-technology')
            ->with([
                'ipApplications' =>IptbmIpAlert::with('ip_type','technology','technology.iptbmprofiles.agency','protectionStatus')
                    ->whereHas('technology')
                    ->latest()->get()
            ])
            ->layout(AbhAdminApp::class);
    }
}
