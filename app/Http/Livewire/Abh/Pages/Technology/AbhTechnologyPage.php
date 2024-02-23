<?php

namespace App\Http\Livewire\Abh\Pages\Technology;


use App\Models\iptbm\IptbmIpAlert;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhTechnologyPage extends Component
{


    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.abh.pages.technology.abh-technology-page')
            ->with([
                'ip_tech' => IptbmIpAlert::with(['technology.iptbmprofiles.agency', 'protectionStatus', 'ip_type', 'technology.deployment', 'technology.extension'])
                    ->whereHas('technology', function ($query) {
                        $query->whereDoesntHave('deployment')
                            ->whereDoesntHave('extension')
                            ->whereDoesntHave('pre_commercialization')
                            ->whereDoesntHave('commercial_adopters')
                            ->whereHas('iptbmprofiles.agency', function ($agency) {
                                $agency->where('name', Auth::user()->abh_profile->agency->name);
                            });
                    })
                    ->get()
            ])
            ->layout(AbhLayout::class);
    }
}
