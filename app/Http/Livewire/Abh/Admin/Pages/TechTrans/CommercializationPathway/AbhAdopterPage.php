<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechTrans\CommercializationPathway;

use App\Models\iptbm\IptbmCommercializationAdopter;
use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhAdopterPage extends Component
{
    public function render()
    {
        return view('livewire.abh.admin.pages.techtrans.commercialization-pathway.abh-adopter-page')
            ->with([
                'adopters' =>IptbmCommercializationAdopter::with([
                    'technology',
                    'contacts'
                ])
                    ->whereHas('technology', function ($query) {
                        $query->whereDoesntHave('deployment')
                            ->whereDoesntHave('extension')
                            //->whereDoesntHave('commercial_adopters')
                            ->whereHas('iptbmprofiles.agency');
                    })
                    ->get()
            ])
            ->layout(AbhAdminApp::class);
    }
}
