<?php

namespace App\Http\Livewire\Iptbm\Admin\Agency;

use App\Models\iptbm\AgencyContact;
use App\Rules\iptbm\MaxContact;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AgencyDetails extends Component
{
    public $agency;
    public $agencyName;
    public $agencyAddress;
    public $agencyHead;
    public $designation;

    public $email;
    public $mobile;
    public $phone;
    public $fax;

    public $agencyContactEmail;
    public $agencyContactPhone;
    public $agencyContactFax;
    public $agencyContactMobile;


    public function deleteAgencyContact(AgencyContact $id)
    {
        $id->delete();
        $this->emit('reloadPage');
    }

    public function saveAgencyEmail()
    {
        $this->validateOnly('agencyContactEmail');
        $this->agency->contacts()->save(new AgencyContact([
            'contact_type' => 'email',
            'contact' => $this->agencyContactEmail
        ]));
        $this->emit('reloadPage');
    }

    public function saveAgencyPhone()
    {
        $this->validateOnly('agencyContactPhone');
        $this->agency->contacts()->save(new AgencyContact([
            'contact_type' => 'phone',
            'contact' => $this->agencyContactPhone
        ]));
        $this->emit('reloadPage');
    }

    public function saveAgencyMobile()
    {
        $this->validateOnly('agencyContactMobile');
        $this->agency->contacts()->save(new AgencyContact([
            'contact_type' => 'mobile',
            'contact' => $this->agencyContactMobile
        ]));
        $this->emit('reloadPage');
    }

    public function saveAgencyFax()
    {
        $this->validateOnly('agencyContactFax');
        $this->agency->contacts()->save(new AgencyContact([
            'contact_type' => 'fax',
            'contact' => $this->agencyContactFax
        ]));
        $this->emit('reloadPage');
    }

    public function saveContactEmail()
    {
        $this->validateOnly('email');
        $this->agency->head->email = $this->email;
        $this->agency->head->save();
        $this->emit('reloadPage');
    }

    public function saveContactPhone()
    {
        $this->validateOnly('phone');
        $this->agency->head->tel = $this->phone;
        $this->agency->head->save();
        $this->emit('reloadPage');
    }

    public function saveContactFax()
    {
        $this->validateOnly('fax');
        $this->agency->head->fax = $this->fax;
        $this->agency->head->save();
        $this->emit('reloadPage');
    }

    public function saveContactMobile()
    {
        $this->validateOnly('mobile');
        $this->agency->head->mobile = $this->mobile;
        $this->agency->head->save();
        $this->emit('reloadPage');
    }

    public function saveAgencyHead()
    {
        $this->agency->head = $this->agencyHead;
        $this->agency->save();
        $this->emit('reloadPage');
    }

    public function saveDesignation()
    {
        $this->agency->designation = $this->designation;
        $this->agency->save();
        $this->emit('reloadPage');
    }

    public function saveAgencyName()
    {
        $this->agency->name = $this->agencyName;
        $this->agency->save();
        $this->emit('reloadPage');
    }

    public function saveAgencyAddress()
    {
        $this->agency->address = $this->agencyAddress;
        $this->agency->save();
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'agencyName' => [
                'required',
                'unique:iptbm_agencies,name'
            ],
            'agencyAddress' => 'required',
            'agencyHead' => 'required',
            'designation' => 'required',
            'phone' => 'required|min:9|max:10',
            'mobile' => 'required|digits:11',
            'fax' => 'required|min:9|max:10',
            'email' => 'required|email|max:40',
            'agencyContactEmail' => [
                'required',
                'max:40',
                Rule::unique(AgencyContact::class, 'contact')->where('iptbm_agency_id', $this->agency->id),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'email',
                    'iptbm_agency_id',
                    $this->agency->id,
                    'Email address was already reached its maximum limit.'
                ),
            ],
            'agencyContactPhone' => [
                'required',
                'min:9',
                'max:10',
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'phone',
                    'iptbm_agency_id',
                    $this->agency->id,
                    'Phone number was already reached its maximum limit.'
                ),
                Rule::unique(AgencyContact::class, 'contact')->where('iptbm_agency_id', $this->agency->id)

            ],
            'agencyContactMobile' => [
                'required',
                'digits:11',
                Rule::unique(AgencyContact::class, 'contact')->where('iptbm_agency_id', $this->agency->id),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'mobile',
                    'iptbm_agency_id',
                    $this->agency->id,
                    'Mobile number was already reached its maximum limit.'
                ),
            ],
            'agencyContactFax' => [
                'required',
                'min:9',
                'max:10',
                Rule::unique(AgencyContact::class, 'contact')->where('iptbm_agency_id', $this->agency->id),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'fax',
                    'iptbm_agency_id',
                    $this->agency->id,
                    'Fax number was already reached its maximum limit.'
                ),
            ],
        ];
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function mount($agency): void
    {
        $this->agency = $agency;
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.admin.agency.agency-details');
    }
}
