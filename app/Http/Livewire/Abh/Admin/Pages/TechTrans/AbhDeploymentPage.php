<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Techtrans;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhDeploymentPage extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.techtrans.abh-deployment-page')
            ->layout(AbhAdminApp::class);
    }
}
