<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;


use App\Models\abh\AbhAgencyContact;
use App\Models\iptbm\AgencyContact;
use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Rules\iptbm\MaxContact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AgencyForm extends Component
{
    public $showAgencyHeadForm = false;

    public $agency_head;
    public $designation;


    public $agency_name;
    public $agency_address;
    public $agency_code;

    public $prof;


    public $mobile;
    public $phone;
    public $fax;
    public $email;


    public function deleteContact(AgencyContact $contact)
    {
        $contact->delete();
        $this->emit('reloadPage');
    }
    public function saveContact($attrib, $type)
    {
        $this->validateOnly($attrib);
        switch ($attrib) {
            case 'mobile':
                $this->prof->agency->contacts()->save(new AgencyContact([
                    'contact_type' => $type,
                    'contact' => $this->mobile
                ]));
                $this->emit('reloadPage');
                break;

            case 'phone':
                $this->prof->agency->contacts()->save(new AgencyContact([
                    'contact_type' => $type,
                    'contact' => $this->phone
                ]));
                $this->emit('reloadPage');
                break;
            case 'fax':

                $this->prof->agency->contacts()->save(new AgencyContact([
                    'contact_type' => $type,
                    'contact' => $this->fax
                ]));
                $this->emit('reloadPage');
                break;
            case 'email':

                $this->prof->agency->contacts()->save(new AgencyContact([
                    'contact_type' => $type,
                    'contact' => $this->email
                ]));
                $this->emit('reloadPage');
                break;
        }

    }





    public function agencyHead()
    {
        $this->validateOnly('agency_head');
        $this->validateOnly('designation');
        $this->prof->agency->head=$this->agency_head;
        $this->prof->agency->designation=$this->designation;
        $this->prof->agency->save();
        session()->flash('saveHead','updated successfully!');
    }

    public function agencyName()
    {
     if($this->agency_name!==$this->prof->agency->name)
     {
         $this->validateOnly('agency_name');
     }
        if($this->agency_code!==$this->prof->agency->code)
        {
            $this->validateOnly('agency_code');
        }
        if($this->agency_address!==$this->prof->agency->address)
        {
            $this->validateOnly('agency_address');
        }


        $this->prof->agency->name=$this->agency_name;
        $this->prof->agency->address=$this->agency_address;
        $this->prof->agency->code=$this->agency_code;
        $this->prof->agency->save();
        $this->emit('reloadPage');
    }

    public function resetHead()
    {
        $this->reset('agency_head');
        $this->resetValidation(['agency_head']);

    }

    public function resetDesignation()
    {
        $this->reset('designation');
        $this->resetValidation(['designation']);
    }

    public function resetHeadDetails()
    {
        $this->resetHead();
        $this->resetDesignation();
    }

    public function resetAgencyName()
    {
        $this->reset('agency_name');
        $this->resetValidation(['agency_name']);
        $this->agency_name=$this->prof->agency->name;
    }
    public function resetAgencyAddress()
    {
        $this->reset('agency_address');
        $this->resetValidation(['agency_address']);
        $this->agency_address=$this->prof->agency->address;
    }
    public function resetAgencyCode()
    {
        $this->reset('agency_code');
        $this->resetValidation(['agency_code']);
        $this->agency_code=$this->prof->agency->code;
    }

    public function reseterAgecnyDetails()
    {
        $this->resetAgencyAddress();
        $this->resetAgencyName();
        $this->resetAgencyCode();
    }

    public function rules()
    {
        return [
            'agency_name' =>[
                'required',
                'max:50',
                Rule::unique(IptbmAgency::class,'name')
            ],
            'agency_address' =>[
                'required',
                'max:100',
            ],

            'agency_code' =>[
                'required',
                'max:100',
                Rule::unique(IptbmAgency::class,'name')
            ],
            'agency_head' =>[
                'required',
                'max:100',
            ],
            'designation'=>[
                'required',
                'max:50',
            ],
            'mobile' =>[
                'required',
                'digits:11',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->prof->agency->id)->where('contact_type','mobile'),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'mobile',
                    'iptbm_agency_id',
                    $this->prof->agency->id,
                    'Mobile number was already reached its maximum limit.'
                ),
            ],
            'phone' =>[
                'required',
                'min:9',
                'max:10',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->prof->agency->id)->where('contact_type','phone'),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'phone',
                    'iptbm_agency_id',
                    $this->prof->agency->id,
                    'Phone number was already reached its maximum limit.'
                ),
            ],
            'fax' =>[
                'required',
                'min:9',
                'max:10',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->prof->agency->id)->where('contact_type','fax'),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'fax',
                    'iptbm_agency_id',
                    $this->prof->agency->id,
                    'Fax number was already reached its maximum limit.'
                ),
            ],
            'email' =>[
                'required',
                'email',
                'max:50',
                Rule::unique(AgencyContact::class,'contact')->where('iptbm_agency_id',$this->prof->agency->id)->where('contact_type','email'),
                new MaxContact(
                    3,
                    'agency_contacts',
                    'contact',
                    'contact_type',
                    'email',
                    'iptbm_agency_id',
                    $this->prof->agency->id,
                    'Email address was already reached its maximum limit.'
                ),
            ]
        ];
    }


    public function mount($profile): void
    {

        $this->prof = $profile->load('agency.contact_mobile');
        $this->agency_name=$this->prof->agency->name;
        $this->agency_code=$this->prof->agency->code;
        $this->agency_address=$this->prof->agency->address;



        // $this->agency_head = ($prof->agency->head->count() > 0) ? $prof->agency->head[0]->head : '';
    }

    public function save(): RedirectResponse
    {
        $this->validate([
            'agency_head' => 'required|min:5'
        ]);
        $agency = AgencyHead::where('iptbm_agency_id', $this->prof->agency->id)->first();
        $agency->head = $this->agency_head;
        $agency->save();
        return redirect()->route('iptbm.staff.ipprof');
    }

    public function render()
    {

        return view('livewire.iptbm.staff.profile.agency-form',[
            'profile' => $this->prof,
            'contact_mobile'=>$this->prof->agency->contact_mobile,
            'contact_phone'=>$this->prof->agency->contact_phone,
            'contact_fax'=>$this->prof->agency->contact_fax,
            'contact_email'=>$this->prof->agency->contact_email,
        ]);
    }
}
