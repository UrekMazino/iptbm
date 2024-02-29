<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhExtensionPage extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.techtrans.abh-extension-page')
            ->layout(AbhAdminApp::class);
    }
}
