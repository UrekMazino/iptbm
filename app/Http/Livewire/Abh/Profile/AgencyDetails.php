<?php

namespace App\Http\Livewire\Abh\Profile;

use App\Models\abh\AbhAgency;
use App\Models\iptbm\IptbmAgency;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class AgencyDetails extends Component
{

    public $agency;
    public $agencyName;
    public $agencyHead;

    public function saveAgencyHead(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->validateOnly('agencyHead');
        $this->agency->head = $this->agencyHead;
        $this->agency->save();
        return redirect(route("abh.staff.profile"));
    }

    public function saveAgencyName()
    {
        $this->validateOnly('agencyName');
        $this->agency->name = $this->agencyName;
        $this->agency->save();
        return redirect(route("abh.staff.profile"));
    }


    public function rules()
    {
        return [
            'agencyName' => ['required', 'max:50', 'unique:abh_agencies,name'],
            'agencyHead' => ['required', 'max:50', 'unique:abh_agencies,name']
        ];
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }

    public function mount(IptbmAgency $agency): void
    {
        $this->agency = $agency->load('contact_mobile', 'contact_phone', 'contact_fax', 'contact_email');
        $this->agencyName = $agency->name;
        $this->agencyHead = $agency->head;
    }

    public function render()
    {
        return view('livewire.abh.profile.agency-details');
    }
}
