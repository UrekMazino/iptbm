<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway;

use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhPrecomPage extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.pages.techtrans.commercialization-pathway.abh-precom-page')
            ->layout(AbhAdminApp::class);
    }
}
