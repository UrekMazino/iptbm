<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Technologies;

use App\Models\iptbm\IptbmIpAlert;
use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhTechnologiesDetail extends Component
{
    public $ip_tech;
    public function mount(IptbmIpAlert $ipprotec): void
    {

        $this->ip_tech=$ipprotec->load(
            'expenses',
            'technology',
            'protectionStatus',
            'ip_type',
        );
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.pages.technologies.abh-technologies-detail')
            ->with([
                'profile'=>$this->ip_tech->technology->iptbmprofiles,
                'technology'=>$this->ip_tech->technology
            ])
            ->layout(AbhAdminApp::class);
    }
}
