<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans;

use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhDeploymentPage extends Component
{
    public function render(): View|Application|Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.pages.techtrans.abh-deployment-page')
            ->layout(AbhAdminApp::class);
    }
}
