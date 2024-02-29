<?php

namespace App\Http\Livewire\Abh\Pages\Technology;


use App\Models\iptbm\IptbmIpAlert;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhTechImagePage extends Component
{
    public $ip_tech;
    public function mount(IptbmIpAlert $technology): void
    {
        $this->ip_tech=$technology;
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.pages.technology.abh-tech-image-page')
            ->with(['ip_protection' => $this->ip_tech])
            ->layout(AbhLayout::class);
    }
}
