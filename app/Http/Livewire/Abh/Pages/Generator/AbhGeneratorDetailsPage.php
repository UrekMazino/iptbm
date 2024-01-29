<?php

namespace App\Http\Livewire\Abh\Pages\Generator;

use App\Models\abh\AbhGenerator;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhGeneratorDetailsPage extends Component
{
    public $generator;


    public function mount(AbhGenerator $generator): void
    {
        $generator->load('contacts','expertise','status','latest_agency_affiliated');
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.pages.generator.abh-generator-details-page')
            ->with(['generator' => $this->generator])
            ->layout(AbhLayout::class);
    }
}
