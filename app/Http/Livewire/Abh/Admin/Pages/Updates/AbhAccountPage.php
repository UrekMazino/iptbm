<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhAccountPage extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.updates.abh-account-page')
            ->layout(AbhAdminApp::class);
    }
}
