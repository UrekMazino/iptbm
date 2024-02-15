<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway;

use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhAdopterPage extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.techtrans.commercialization-pathway.abh-adopter-page')
            ->layout(AbhAdminApp::class);
    }
}
