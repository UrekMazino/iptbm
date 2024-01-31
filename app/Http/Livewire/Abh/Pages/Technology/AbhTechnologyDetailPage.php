<?php

namespace App\Http\Livewire\Abh\Pages\Technology;

use App\Models\abh\AbhTechnologyProfile;
use App\View\Components\abh\AbhLayout;
use Livewire\Component;

class AbhTechnologyDetailPage extends Component
{

    public $technology;

    public function mount(AbhTechnologyProfile $technology)
    {
        $this->technology = $technology;
    }
    public function render()
    {
        $this->technology->load('co_owner');
        return view('livewire.abh.pages.technology.abh-technology-detail-page')
            ->with(['technology' => $this->technology])
            ->layout(AbhLayout::class,[
                'pagetitle'=>'Technology'
            ]);
    }
}
