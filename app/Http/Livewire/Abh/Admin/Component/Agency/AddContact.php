<?php

namespace App\Http\Livewire\Abh\Admin\Component\Agency;

use App\Models\abh\AbhAgency;
use App\Models\abh\AbhAgencyContact;
use App\Models\iptbm\AgencyContact;
use App\Rules\iptbm\MaxContact;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddContact extends Component
{
    public $agency;
    public $contact;
    public $contact_type;



    public function save_contact(): void
    {


        if($this->contact_type==='mobile')
        {
            $this->validate([
                'contact'=>[
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
                    'numeric',
                    'digits:11',
                  //  'contact_type'=>'in:mobile,phone,fax,email',
                    Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)
                ],

            ]);
        }
        if($this->contact_type==='phone')
        {
            $this->validate([
                'contact'=>[
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
                    'min:7',
                    'regex:/^\((\d{2}|\d{3})\)-\d{7}$/',
                    'max:13',
                   // 'contact_type'=>'in:mobile,phone,fax,email',
                    Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)
                ],

            ]);
        }
        if($this->contact_type==='fax')
        {
            $this->validate([
                'contact'=>[
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
                    'min:7',
                    'regex:/^\((\d{2}|\d{3})\)-\d{7}$/',
                    'max:13',
                    // 'contact_type'=>'in:mobile,phone,fax,email',
                    Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)
                ],

            ]);
        }
        if($this->contact_type==='email')
        {
            $this->validate([
                'contact'=>[
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
                    'max:80',
                    // 'contact_type'=>'in:mobile,phone,fax,email',
                    Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)
                ],

            ]);
        }


        $this->agency->contacts()->save(new AgencyContact([
            'contact'=>$this->contact,
            'contact_type'=>$this->contact_type
        ]));
        $this->reset('contact');
        $this->emit('reloadPage');
        session()->flash('contact_success', 'Contact added successfully!');
    }


    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function rules(): array
    {
        return[
            'contact' =>[
                'required',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->agency->id)

            ]
        ];
    }
    public function mount( $agency,$type): void
    {
        $this->agency = $agency;
        $this->contact_type=$type;
    }


    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.component.agency.add-contact');
    }
}
