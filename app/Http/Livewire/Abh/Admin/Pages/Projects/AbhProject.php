<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Projects;

use App\Http\Livewire\Abh\Profile\AbhProfileProject;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhProject extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.projects.abh-project')
            ->with([
                'projects'=>\App\Models\abh\AbhProject::with('abh_profile','year_implemented')->get()
            ])
            ->layout(AbhAdminApp::class);
    }
}
