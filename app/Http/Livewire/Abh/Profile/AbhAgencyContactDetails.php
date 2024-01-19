<?php

namespace App\Http\Livewire\Abh\Profile;

use App\Models\abh\AbhAgencyContact;
use App\Models\iptbm\AgencyContact;
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
                Rule::unique(AbhAgencyContact::class,'contact')->where('abh_agency_id',$this->agency->id)->where('type',$this->type),
                new MaxContact(
                    3,
                    'abh_agency_contacts',
                    'contact',
                    'type',
                    $this->type,
                    'abh_agency_id',
                    $this->agency->id,
                    $this->costumMesg[$this->type]
                ),
            ],
            'phone', 'fax' => [
                'required',
                'min:9',
                'max:10',
                Rule::unique(AbhAgencyContact::class,'contact')->where('abh_agency_id',$this->agency->id)->where('type',$this->type),
                new MaxContact(
                    3,
                    'abh_agency_contacts',
                    'contact',
                    'type',
                    $this->type,
                    'abh_agency_id',
                    $this->agency->id,
                    $this->costumMesg[$this->type]
                ),
            ],
            'email' => [
                'required',
                'email',
                'max:40',
                Rule::unique(AbhAgencyContact::class,'contact')->where('abh_agency_id',$this->agency->id)->where('type',$this->type),
                new MaxContact(
                    3,
                    'abh_agency_contacts',
                    'contact',
                    'type',
                    $this->type,
                    'abh_agency_id',
                    $this->agency->id,
                    $this->costumMesg[$this->type]
                ),
            ],
        };
    }


    public function saveContact(): void
    {
        $this->validate();
        $this->agency->contacts()->save(new AbhAgencyContact([
            'type'=>$this->type,
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
