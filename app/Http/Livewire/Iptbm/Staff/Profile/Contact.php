<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmProfileContact;
use App\Rules\iptbm\ContactCounter;
use App\Rules\iptbm\MaxContact;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Contact extends Component
{

    public $profile;

    public $mobile=[];
    public $phone=[];
    public $email=[];
    public $fax=[];

    public $mobileInput;
    public $phoneInput;
    public $faxInput;
    public $emailInput;


    public $showMobileForm = false;
    public $showPhoneForm = false;
    public $showEmailForm = false;
    public $showFaxForm = false;




    public function mount(IptbmProfile $profile): void
    {
        $this->profile =$profile->load([
            'contact_mobile',
            'contact_phone',
            'contact_fax',
            'contact_email',
            ]);

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
                new MaxContact(
                    3,
                    'iptbm_profile_contacts',
                    'contact',
                    'contact_type',
                    'mobile',
                    'iptbm_profiles_id',
                    $this->profile->id,
                    'Mobile number was already reached its maximum limit.'
                ),
            ],
            'phoneInput' => [
                'required',
                Rule::unique('iptbm_profile_contacts', 'contact')
                    ->where('contact_type', 'phone'),
                'numeric',
                'max_digits:10',
                'min_digits:7',
                new MaxContact(
                    3,
                    'iptbm_profile_contacts',
                    'contact',
                    'contact_type',
                    'phone',
                    'iptbm_profiles_id',
                    $this->profile->id,
                    'Phone number was already reached its maximum limit.'
                ),
            ],
            'faxInput' => [
                'required',
                Rule::unique('iptbm_profile_contacts', 'contact')
                    ->where('contact_type', 'fax'),
                'numeric',
                'max_digits:10',
                'min_digits:7',
                new MaxContact(
                    3,
                    'iptbm_profile_contacts',
                    'contact',
                    'contact_type',
                    'fax',
                    'iptbm_profiles_id',
                    $this->profile->id,
                    'Fax number was already reached its maximum limit.'
                ),
            ],
            'emailInput' => [
                'required',
                'email',
                'max:40',
                new MaxContact(
                    3,
                    'iptbm_profile_contacts',
                    'contact',
                    'contact_type',
                    'email',
                    'iptbm_profiles_id',
                    $this->profile->id,
                    'Email address was already reached its maximum limit.'
                ),
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

    public function deleteContact(IptbmProfileContact $contact)
    {
        $contact->delete();
        $this->emit('reloadPage');
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
        return view('livewire.iptbm.staff.profile.contact')->with([
            'contact_mobile'=>$this->profile->contact_mobile,
            'contact_phone'=>$this->profile->contact_phone,
            'contact_fax'=>$this->profile->contact_fax,
            'contact_email'=>$this->profile->contact_email,
        ]);
    }
}
