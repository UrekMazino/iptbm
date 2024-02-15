<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Profile;

use App\Models\abh\AbhProfile;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AllAbhProfile extends Component
{
    public function render()
    {

        return view('livewire.abh.admin.pages.profile.all-abh-profile')
            ->with([
                'profiles'=>AbhProfile::all()
            ])
            ->layout(AbhAdminApp::class);
    }
}
