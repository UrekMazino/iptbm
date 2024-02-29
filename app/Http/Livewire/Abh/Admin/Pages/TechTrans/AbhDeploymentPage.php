<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhDeploymentPage extends Component
{
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.pages.techtrans.abh-deployment-page')
            ->layout(AbhAdminApp::class);
    }
}
