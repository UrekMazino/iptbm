<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Projects;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhProject extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.projects.abh-project')
            ->layout(AbhAdminApp::class);
    }
}
