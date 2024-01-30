<?php

namespace App\Http\Livewire\Abh\Pages\Technology;

use App\Models\abh\AbhTechnologyProfile;
use App\View\Components\abh\AbhLayout;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhAllTechnologyPage extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {



        return view('livewire.abh.pages.technology.abh-all-technology-page')
            ->layout(AbhLayout::class);
    }
}
