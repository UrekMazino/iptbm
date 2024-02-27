<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Profile;

use App\Models\abh\AbhProfile;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AllAbhProfile extends Component
{
    public function render()
    {

        return view('livewire.abh.admin.pages.profile.all-abh-profile')
            ->with([
                'profiles'=>AbhProfile::with(
                   [
                       'users',
                       'agency',
                       'agency.profiles.technologies'=>function ($technology) {
                           $technology->wherehas('pre_commercialization');
                       },
                       'agency.region',
                       'contact',
                       'contacts_mobiles',
                       'contacts_faxes',
                       'contacts_emails',
                       'projects',
                       'map_location'
                   ]
                )->get()
            ])
            ->layout(AbhAdminApp::class);
    }
}
