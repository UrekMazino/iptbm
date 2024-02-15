<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;

use App\Models\abh\AbhAgency;
use App\Models\abh\AbhRegion;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhAgenciesPage extends Component
{

    public $agency_name;
    public $agency_region;
    public $agency_code;
    public $agency_address;
    public $agency_head;
    public $agency_head_designation;
    public function render()
    {
        return view('livewire.abh.admin.pages.updates.abh-agencies-page')
            ->with([
                'agencies' =>AbhAgency::with('profile','region')->latest()->get(),
                'regions'=>AbhRegion::all()
            ])
            ->layout(AbhAdminApp::class);
    }
}
