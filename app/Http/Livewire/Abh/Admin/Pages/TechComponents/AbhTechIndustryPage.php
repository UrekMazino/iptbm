<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechComponents;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhTechIndustryPage extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.tech-components.abh-tech-industry-page')
            ->layout(AbhAdminApp::class);
    }
}
