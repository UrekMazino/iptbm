<?php

namespace App\Http\Livewire\Abh\Dashboard;

use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class DashBoardPage extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.abh.dashboard.dash-board-page')
            ->layout(AbhLayout::class,['pagetitle' => 'Dashboard']);
    }
}
