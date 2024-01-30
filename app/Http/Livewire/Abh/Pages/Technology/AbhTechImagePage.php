<?php

namespace App\Http\Livewire\Abh\Pages\Technology;

use App\Models\abh\AbhTechnologyProfile;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhTechImagePage extends Component
{

    public $technology;
    public function mount(AbhTechnologyProfile $technology): void
    {
        $this->technology=$technology;
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.pages.technology.abh-tech-image-page')
            ->with(['technology' => $this->technology])
            ->layout(AbhLayout::class);
    }
}
