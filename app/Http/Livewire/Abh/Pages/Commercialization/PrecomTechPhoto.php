<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\View\Components\abh\AbhLayout;
use Livewire\Component;

class PrecomTechPhoto extends Component
{

    public $precom;

    public function mount(IptbmCommercializationPrecom $technology)
    {
        $this->precom = $technology;
    }
    public function render()
    {
        return view('livewire.abh.pages.commercialization.precom-tech-photo')
            ->with([
                'precom' => $this->precom
            ])
            ->layout(AbhLayout::class);
    }
}
