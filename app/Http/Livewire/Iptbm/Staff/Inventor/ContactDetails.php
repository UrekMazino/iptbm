<?php

namespace App\Http\Livewire\Iptbm\Staff\Inventor;

use App\Models\iptbm\IptbmInventorContact;
use App\Rules\iptbm\ContactCounter;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ContactDetails extends Component
{
    public $inventor;
    public $showMobileInput=false;
    public $showPhoneInput=false;
    public $showFaxInput=false;
    public $showMailInput=false;

    public $mobile;
    public $phone;
    public $fax;
    public $email;

    public $contacts;

    public function rules()
    {
        return [
            'mobile'=>[
                'required',
                'numeric',
                'digits:11',
                new ContactCounter(
                    3,
                    'iptbm_inventor_contacts',
                    'contact',
                    'type',
                    'mobile',
                    'Mobile phone number was already reached its maximum limit.'
                ),
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$this->inventor->id)
            ],
            'phone'=>[
                'required',
                'numeric',
                'max_digits:10',
                'min_digits:7',
                new ContactCounter(
                    3,
                    'iptbm_inventor_contacts',
                    'contact',
                    'type',
                    'phone',
                    'Telephone number was already reached its maximum limit.'
                ),
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$this->inventor->id)
            ],
            'fax'=>[
                'required',
                'numeric',
                'max_digits:10',
                'min_digits:7',
                new ContactCounter(
                    3,
                    'iptbm_inventor_contacts',
                    'contact',
                    'type',
                    'fax',
                    'Fax number was already reached its maximum limit.'
                ),
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$this->inventor->id)
            ],
            'email'=>[
                'required',
                'email',
                'max:40',
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$this->inventor->id)
            ]
        ];
    }

    protected $validationAttributes=[
        'mobile'=>'Mobile number',
        'phone'=>'Phone number',
        'fax'=>'Fax number',
        'email'=>'Email address',
    ];

    public function showMobileInput()
    {
        $this->showMobileInput=!$this->showMobileInput;
        $this->resetValidation(['mobile']);
        $this->reset(['mobile']);
    }

    public function saveMobile()
    {
        $this->validateOnly('mobile');


        $this->inventor->contacts()->save(new IptbmInventorContact([
            'type'=>'mobile',
            'contact'=>$this->mobile
        ]));
        $this->inventor->save();
        $this->reset(['mobile']);
        $this->inventor->refresh();
        $this->contacts=$this->inventor->contacts;

      //  return redirect()->route('iptbm.inventor.show.profile',['id'=>$this->inventor->id]);

    }
    public function savePhone()
    {
        $this->validate([
            'phone'=>[
                'required',
                'min:7',
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$this->inventor->id)
            ]
        ]);

        $this->inventor->contacts()->save(new IptbmInventorContact([
            'type'=>'phone',
            'contact'=>$this->phone
        ]));
        $this->inventor->save();
        $this->reset(['phone']);
        $this->inventor->refresh();
        $this->contacts=$this->inventor->contacts;

        //  return redirect()->route('iptbm.inventor.show.profile',['id'=>$this->inventor->id]);

    }
    public function saveFax()
    {
        $this->validate([
            'fax'=>[
                'required',
                'min:7',
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$this->inventor->id)
            ]
        ]);

        $this->inventor->contacts()->save(new IptbmInventorContact([
            'type'=>'fax',
            'contact'=>$this->fax
        ]));
        $this->inventor->save();
        $this->reset(['fax']);
        $this->inventor->refresh();
        $this->contacts=$this->inventor->contacts;

        //  return redirect()->route('iptbm.inventor.show.profile',['id'=>$this->inventor->id]);

    }
    public function saveMail()
    {
        $this->validate([
            'email'=>[
                'required',
                'min:7',
                Rule::unique(IptbmInventorContact::class,'contact')
                    ->where('iptbm_inventor_id',$this->inventor->id)
            ]
        ]);

        $this->inventor->contacts()->save(new IptbmInventorContact([
            'type'=>'email',
            'contact'=>$this->email
        ]));
        $this->inventor->save();
        $this->reset(['email']);
        $this->inventor->refresh();
        $this->contacts=$this->inventor->contacts;

        //  return redirect()->route('iptbm.inventor.show.profile',['id'=>$this->inventor->id]);

    }

    public function deleteContact($id)
    {
        IptbmInventorContact::find($id)->delete();
        $this->inventor->refresh();
        $this->contacts=$this->inventor->contacts;
    }






    public function showPhoneInput()
    {
        $this->showPhoneInput=!$this->showPhoneInput;
        $this->reset(['phone']);
        $this->resetValidation(['phone']);
    }

    public function showFaxInput()
    {
        $this->showFaxInput=!$this->showFaxInput;
        $this->reset(['fax']);
        $this->resetValidation(['fax']);
    }

    public function showMailInput()
    {
        $this->showMailInput=!$this->showMailInput;
        $this->reset(['email']);
        $this->resetValidation(['email']);
    }


    public function mount($inventor)
    {
        $this->inventor=$inventor;
        $this->contacts=$this->inventor->contacts;
    }

    public function updated($properties)
    {
        $this->validateOnly($properties);

    }

    public function render()
    {
        return view('livewire.iptbm.staff.inventor.contact-details');
    }
}
