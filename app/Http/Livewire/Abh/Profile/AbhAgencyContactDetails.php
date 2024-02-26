<?php

namespace App\Http\Livewire\Abh\Profile;

use App\Models\abh\AbhAgencyContact;
use App\Models\iptbm\AgencyContact;
use App\Models\iptbm\IptbmAgency;
use App\Rules\iptbm\MaxContact;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AbhAgencyContactDetails extends Component
{
    public $agency;
    public $label;
    public $type;
    public $contact;
    public function deleteContact(AbhAgencyContact $contact): void
    {
        $contact->delete();
        $this->emit('reloadPage');
    }
    public $costumMesg=[
            'mobile'=>'Mobile number was already reached its maximum limit.',
            'phone'=>'Telephone number was already reached its maximum limit.',
            'fax'=>'Fax number was already reached its maximum limit.',
            'email'=>'Email Addressr was already reached its maximum limit.',
        ];
    public $costumVal=[
        'mobile'=> [
            'required',
            'digits:11',
        ],
        'phone'=> 'required|min:9|max:10',
        'fax' => 'required|min:9|max:10',
        'email' => 'required|email|max:40',
    ];
    public function costumValidation()
    {
        return match ($this->type)
        {
            'mobile'=> [
                'required',
                'digits:11',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)->where('contact_type',$this->type),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    $this->type,
                    'iptbm_agency_id',
                    $this->agency->id,
                    $this->costumMesg[$this->type]
                ),
            ],
            'phone', 'fax' => [
                'required',
                'min:9',
                'max:10',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)->where('contact_type',$this->type),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    $this->type,
                    'iptbm_agency_id',
                    $this->agency->id,
                    $this->costumMesg[$this->type]
                ),
            ],

            'email' => [
                'required',
                'email',
                'max:40',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)->where('contact_type',$this->type),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    $this->type,
                    'iptbm_agency_id',
                    $this->agency->id,
                    $this->costumMesg[$this->type]
                ),
            ],
        };
    }


    public function saveContact(): void
    {
        $this->validate();
        $this->agency->contacts()->save(new AgencyContact([
            'contact_type'=>$this->type,
            'contact'=>$this->contact
        ]));
        $this->emit('reloadPage');
    }
    public function rules()
    {

        return[
            'contact' =>$this->costumValidation()
        ];
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }
    public function mount($agency, $label, $type)
    {
        $this->agency = $agency;
        $this->label = $label;
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.abh.profile.abh-agency-contact-details');
    }
}
