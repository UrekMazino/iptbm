<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Profile;

use App\Models\abh\AbhProfile;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhProfileDetail extends Component
{
    public $profile;
    public function mount(AbhProfile $profile)
    {
        $this->profile=$profile->load('contacts_mobiles','contacts_phones','contacts_faxes','contacts_emails');
    }
    public function render()
    {
        return view('livewire.abh.admin.pages.profile.abh-profile-detail')
            ->layout(AbhAdminApp::class);
    }
}
