<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmProfileContact;
use App\Rules\iptbm\ContactCounter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Contact extends Component
{

    public $profile;

    public $mobile;
    public $phone;
    public $email;
    public $fax;

    public $mobileInput;
    public $phoneInput;
    public $faxInput;
    public $emailInput;


    public $showMobileForm = false;
    public $showPhoneForm = false;
    public $showEmailForm = false;
    public $showFaxForm = false;


    public function showMobileForm()
    {
        $this->showMobileForm = !$this->showMobileForm;
    }

    public function showPhoneForm()
    {
        $this->showPhoneForm = !$this->showPhoneForm;
    }

    public function showEmailForm()
    {
        $this->showEmailForm = !$this->showEmailForm;
    }

    public function showFaxForm()
    {
        $this->showFaxForm = !$this->showFaxForm;
    }


    public function mount($profile): void
    {
        $this->profile = IptbmProfile::with('contact')->find($profile);
        $this->mobile = $this->profile->contact->where('contact_type', 'mobile');
        $this->phone = $this->profile->contact->where('contact_type', 'phone');
        $this->fax = $this->profile->contact->where('contact_type', 'fax');
        $this->email = $this->profile->contact->where('contact_type', 'email');

    }

    public function rules()
    {
        return [
            'mobileInput' => [
                'required',
                Rule::unique('iptbm_profile_contacts', 'contact')
                    ->where('contact_type', 'mobie'),
                //->where('iptbm_profiles_id',$this->profile->id),
                'numeric',
                'digits:11',
                new ContactCounter(
                    3,
                    'iptbm_profile_contacts',
                    'contact',
                    'contact_type',
                    'mobile',
                    'Mobile phone number was already reached its maximum limit.'
                )
            ],
            'phoneInput' => [
                'required',
                Rule::unique('iptbm_profile_contacts', 'contact')
                    ->where('contact_type', 'phone'),
                // ->where('iptbm_profiles_id',$this->profile->id),
                'numeric',
                'max_digits:10',
                'min_digits:7',
                new ContactCounter(
                    3,
                    'iptbm_profile_contacts',
                    'contact',
                    'contact_type',
                    'phone',
                    'Telephone number was already reached its maximum limit.'
                )
            ],
            'faxInput' => [
                'required',
                Rule::unique('iptbm_profile_contacts', 'contact')
                    ->where('contact_type', 'fax'),
                // ->where('iptbm_profiles_id',$this->profile->id),
                'numeric',
                'max_digits:10',
                'min_digits:7',
                new ContactCounter(
                    3,
                    'iptbm_profile_contacts',
                    'contact',
                    'contact_type',
                    'fax',
                    'Fax number was already reached its maximum limit.'
                )
            ],
            'emailInput' => [
                'required',
                'email',
                'max:40',
                Rule::unique('iptbm_profile_contacts', 'contact')
                    ->where('contact_type', 'email'),
                // ->where('iptbm_profiles_id',$this->profile->id),
            ]
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function saveMobile()
    {
        $this->validateOnly('mobileInput');
        $this->profile->contact()->save(new IptbmProfileContact([
            'contact_type' => 'mobile',
            'contact' => $this->mobileInput,
        ]));
        return redirect()->route("iptbm.staff.ipProfile");
    }

    public function savePhone()
    {

        $this->validateOnly('phoneInput');
        $this->profile->contact()->save(new IptbmProfileContact([
            'contact_type' => 'phone',
            'contact' => $this->phoneInput,
        ]));
        return redirect()->route("iptbm.staff.ipProfile");
    }

    public function saveFax()
    {
        $this->validateOnly('faxInput');
        $this->profile->contact()->save(new IptbmProfileContact([
            'contact_type' => 'fax',
            'contact' => $this->faxInput,
        ]));
        return redirect()->route("iptbm.staff.ipProfile");
    }

    public function saveEmail()
    {
        $this->validateOnly('emailInput');

        $this->profile->contact()->save(new IptbmProfileContact([
            'contact_type' => 'email',
            'contact' => $this->emailInput,
        ]));
        return redirect()->route("iptbm.staff.ipProfile");
    }


    public function deleteMobile($id)
    {
        $this->profile->contact->find($id)->delete();
        return redirect()->route("iptbm.staff.ipProfile");

    }

    public function deletePhone($id)
    {
        $this->profile->contact->find($id)->delete();
        return redirect()->route("iptbm.staff.ipProfile");
    }

    public function deleteFax($id)
    {
        $this->profile->contact->find($id)->delete();
        return redirect()->route("iptbm.staff.ipProfile");
    }

    public function deleteEmail($id)
    {
        $this->profile->contact->find($id)->delete();
        return redirect()->route("iptbm.staff.ipProfile");
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.staff.profile.contact');
    }
}
