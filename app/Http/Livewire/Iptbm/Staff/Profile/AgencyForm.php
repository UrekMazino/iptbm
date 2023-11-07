<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;


use App\Models\iptbm\AgencyHead;
use Livewire\Component;

class AgencyForm extends Component
{
    public $showAgencyHeadForm = false;

    public $agency_head;

    public $profile;

    public function mount($profile): void
    {

        $this->profile = $profile;

       // $this->agency_head = ($profile->agency->head->count() > 0) ? $profile->agency->head[0]->head : '';
    }

    public function showAgencyHeadForm(): void
    {

        $this->showAgencyHeadForm = !$this->showAgencyHeadForm;
    }

    public function save()
    {
        $this->validate([
            'agency_head' => 'required|min:5'
        ]);
        $agency = AgencyHead::where('iptbm_agency_id', $this->profile->agency->id)->first();
        $agency->head = $this->agency_head;
        $agency->save();
        return redirect()->route('iptbm.staff.ipProfile');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.profile.agency-form');
    }
}
