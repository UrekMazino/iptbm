<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Technologies;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhTechnology extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.technologies.abh-technology')
            ->layout(AbhAdminApp::class);
    }
}
