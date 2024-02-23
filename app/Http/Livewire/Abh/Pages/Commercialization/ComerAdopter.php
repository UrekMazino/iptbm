<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\View\Components\abh\AbhLayout;
use Livewire\Component;

class ComerAdopter extends Component
{
    public function render()
    {
        return view('livewire.abh.pages.commercialization.comer-adopter')
            ->layout(AbhLayout::class);
    }
}
