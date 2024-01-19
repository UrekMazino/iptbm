<?php

namespace App\Http\Livewire\Abh\Profile;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class RegionDetails extends Component
{

    public $profile;

    public $regionName;

    public function saveRegionName(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->validate();
        $this->profile->agency->region->name = $this->regionName;
        $this->profile->agency->region->save();
        return redirect(route("abh.staff.profile"));
    }


    public function rules(): array
    {
        return [
            'regionName' => [
                'required',
                'unique:abh_regions,name'
            ]
        ];
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }

    public function mount($profile): void
    {

        $this->profile = $profile->load('agency.region');


    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.profile.region-details');
    }
}
