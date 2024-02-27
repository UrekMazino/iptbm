<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Projects;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhProjectDetails extends Component
{
    public $project;
    public function mount(\App\Models\abh\AbhProject $project)
    {
        $this->project=$project;
    }
    public function render()
    {
        return view('livewire.abh.admin.pages.projects.abh-project-details')
            ->layout(AbhAdminApp::class);
    }
}
