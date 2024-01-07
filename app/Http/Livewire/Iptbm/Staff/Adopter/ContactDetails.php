<?php

namespace App\Http\Livewire\Iptbm\Staff\Adopter;

use App\Models\iptbm\IptbmComercialAdopterContact;
use App\Rules\iptbm\MaxContact;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ContactDetails extends Component
{
    public $tech;
    public $mobiles;
    public $mobileModel;
    public $showMobileForm = false;
    public $phones;
    public $phoneModel;
    public $showPhoneForm = false;
    public $faxs;
    public $faxModel;
    public $showFaxForm = false;
    public $emails;
    public $emailModel;
    public $showEmailForm = false;

    public function toggleShowMobileForm()
    {
        $this->showMobileForm = !$this->showMobileForm;
        $this->reset('mobileModel');
        $this->resetValidation('mobileModel');
    }

    public function saveMobile()
    {
        $this->validateOnly('mobileModel');
        $this->tech->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'mobile',
            'contact' => $this->mobileModel
        ]));
        $this->emit('reloadPage');
    }

    public function toggleShowPhoneForm()
    {
        $this->showPhoneForm = !$this->showPhoneForm;
        $this->reset('phoneModel');
        $this->resetValidation('phoneModel');
    }

    public function savePhone()
    {
        $this->validateOnly('phoneModel');
        $this->tech->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'phone',
            'contact' => $this->phoneModel
        ]));
        $this->emit('reloadPage');
    }

    public function toggleShowFaxForm()
    {
        $this->showFaxForm = !$this->showFaxForm;
        $this->reset('faxModel');
        $this->resetValidation('faxModel');
    }

    public function saveFax()
    {
        $this->validateOnly('faxModel');
        $this->tech->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'fax',
            'contact' => $this->faxModel
        ]));
        $this->emit('reloadPage');
    }

    public function toggleShowEmailForm()
    {
        $this->showEmailForm = !$this->showEmailForm;
        $this->reset('emailModel');
        $this->resetValidation('emailModel');
    }

    public function saveEmail()
    {
        $this->validateOnly('emailModel');
        $this->tech->contacts()->save(new IptbmComercialAdopterContact([
            'type' => 'email',
            'contact' => $this->emailModel
        ]));
        $this->emit('reloadPage');
    }


    public function rules()
    {
        return [
            'mobileModel' => [
                'required',
                'digits:11',

                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'mobile',
                    'commercial_adoptor_id',
                    $this->tech->id,
                    'Mobile number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->tech->id)
            ],
            'phoneModel' => [
                'required',
                'min_digits:7',
                'max_digits:10',
                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'phone',
                    'commercial_adoptor_id',
                    $this->tech->id,
                    'Phone number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->tech->id)
            ],
            'faxModel' => [
                'required',
                'min_digits:7',
                'max_digits:10',
                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'fax',
                    'commercial_adoptor_id',
                    $this->tech->id,
                    'Fax number was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->tech->id)
            ],
            'emailModel' => [
                'required',
                'email',
                'max:60',
                new MaxContact(
                    3,
                    'iptbm_comercial_adopter_contacts',
                    'contact',
                    'type',
                    'email',
                    'commercial_adoptor_id',
                    $this->tech->id,
                    'Email was already reached its maximum limit.'
                ),
                Rule::unique('iptbm_comercial_adopter_contacts', 'contact')->where('commercial_adoptor_id', $this->tech->id)
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($tech)
    {

        $this->tech = $tech;
        $this->mobiles = $tech->contacts->where('type', 'mobile');
        $this->phones = $tech->contacts->where('type', 'phone');
        $this->faxs = $tech->contacts->where('type', 'fax');
        $this->emails = $tech->contacts->where('type', 'email');
    }

    public function render()
    {
        return view('livewire.iptbm.staff.adopter.contact-details');
    }
}
