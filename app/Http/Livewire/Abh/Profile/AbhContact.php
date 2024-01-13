<?php

namespace App\Http\Livewire\Abh\Profile;

use App\Rules\iptbm\MaxContact;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AbhContact extends Component
{

    public $profile;
    public $type;
    public $mobile;
    public $phone;
    public $fax;
    public $email;

    public function deleteContact(\App\Models\abh\AbhProfileContact $contact): void
    {
        $contact->delete();
        $this->profile->refresh();
        $this->emit('reloadPage');
    }

    public function saveContact($type): void
    {

        $this->validateOnly($type);
        $contact=match ($type){
            'mobile'=>[
                'mobile',
                $this->mobile
            ],
            'phone'=>[
                'phone',
                $this->phone
            ],
            'fax'=>[
                'fax',
                $this->fax
            ],
            'email'=>[
                'email',
                $this->email
            ],
        };
        $this->profile->contacts_mobiles()->save(new \App\Models\abh\AbhProfileContact([
            'type' => $contact[0],
            'contact'=>$contact[1],
        ]));
        $this->profile->refresh();
        $this->render();
        $this->emit('reloadPage');

    }
    public function rules()
    {
        return [
            'mobile'=>[
                'required',
                'digits:11',
                'numeric',
                new MaxContact(
                    3,
                    'abh_profile_contacts',
                    'contact',
                    'type',
                    'mobile',
                    'abh_profiles_id',
                    $this->profile->id,
                    'Mobile number was already reached its maximum limit.'
                ),
                Rule::unique('abh_profile_contacts','contact')->where('abh_profiles_id',$this->profile->id)
            ],
            'phone'=>[
                'required',
                'min_digits:9',
                'max_digits:10',
                'numeric',
                new MaxContact(
                    3,
                    'abh_profile_contacts',
                    'contact',
                    'type',
                    'phone',
                    'abh_profiles_id',
                    $this->profile->id,
                    'Phone number was already reached its maximum limit.'
                ),
                Rule::unique('abh_profile_contacts','contact')->where('abh_profiles_id',$this->profile->id)
            ],
        ];
    }
    public function mount($profile)
    {
        $this->profile=$profile;
    }
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.profile.abh-contact')->with([
            'mobile_contact_list'=>$this->profile->contacts_mobiles,
            'phone_contact_list'=>$this->profile->contacts_phones,
            'fax_contact_list'=>$this->profile->contacts_faxes,
            'email_contact_list'=>$this->profile->contacts_emails
        ]);
    }
}
