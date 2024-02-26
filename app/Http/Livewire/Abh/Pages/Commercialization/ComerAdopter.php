<?php

namespace App\Http\Livewire\Abh\Pages\Commercialization;

use App\Models\iptbm\IptbmCommercializationAdopter;
use App\Models\iptbm\IptbmCommercializationPrecom;
use App\View\Components\abh\AbhLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ComerAdopter extends Component
{

    public function delete_adopter(IptbmCommercializationAdopter $adopter): void
    {
        $adopter->delete();
        $this->emit('reloadPage');
    }
    public function render()
    {

        return view('livewire.abh.pages.commercialization.comer-adopter')
            ->with([
                'adopters' =>IptbmCommercializationAdopter::with([
                   'technology',
                    'contacts'
                ])
                    ->whereHas('technology', function ($query) {
                        $query->whereDoesntHave('deployment')
                            ->whereDoesntHave('extension')
                            //->whereDoesntHave('commercial_adopters')
                            ->whereHas('iptbmprofiles.agency', function ($agency) {
                                $agency->where('name', Auth::user()->abh_profile->agency->name);
                            });
                    })
                    ->get()
            ])
            ->layout(AbhLayout::class);
    }
}
