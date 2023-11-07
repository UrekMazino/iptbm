<?php

namespace App\Http\Livewire\Iptbm\Staff\Inventor;

use App\Models\iptbm\IptbmInventor;
use App\Models\iptbm\IptbmInventorExpertise;
use App\Rules\FullNameValidation;
use Livewire\Component;

class InventorsProfile extends Component
{
    public $inventor;
    public $fname;
    public $mname;
    public $lname;
    public $sname;

    public $fullName;
    public $expertise;
    public $showAddPanel=false;
    public $latestAffiliation;

    public $statusModel;

    public $address;

    public function updateAddress()
    {
        $this->validateOnly('address');
        $this->inventor->address=$this->address;
        $this->inventor->save();
        $this->emit('reloadPage');
    }
    public function resetAddress()
    {
        $this->address=$this->inventor->address;
        $this->resetValidation(['address']);
    }



    public function updateFullName()
    {
        $this->validateOnly('fullName');
        if($this->inventor->name!==$this->fname)
        {
            $this->inventor->name=$this->fname;
        }
        if($this->inventor->middle_name!==$this->mname)
        {
            $this->inventor->middle_name=$this->mname;
        }
        if($this->inventor->last_name!==$this->lname)
        {
            $this->inventor->last_name=$this->lname;
        }
        if($this->inventor->suffixes!==$this->sname)
        {
            $this->inventor->suffixes=$this->sname;
        }
        $this->inventor->save();
        $this->emit('reloadPage');

    }

    public function resetStatusModel()
    {
        $this->statusModel=$this->inventor->status;
        $this->resetValidation(['statusModel']);
    }

    public function updateStatus()
    {
        $this->validateOnly('statusModel');
        $this->inventor->status=$this->statusModel;
        $this->inventor->save();
        session()->flash('success-status','Status updated');

    }

    public function rules()
    {
        return [
            'address'=>'required|max:100',
            'expertise'=>'required|unique:iptbm_inventor_expertises,field|min:5',
            'statusModel'=>'required|in:ACTIVE,RETIRED,DECEASED',
            'fname'=>'required|max:20',
            'mname'=>'nullable|max:1',
            'lname'=>'required|max:20',
            'sname'=>'nullable|max:5',
            'fullName'=>[
                new FullNameValidation(
                    'iptbm_inventors',
                    [
                        'first_name'=>['name',$this->fname],
                        'middle_name'=>['middle_name',$this->mname],
                        'last_name'=>['last_name',$this->lname],
                        'suffixes'=>['suffixes',$this->sname],
                    ],
                    'The system found an existing record. please check the name and try again.',
                    $this->inventor->id
                )
            ]
        ];
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function showAddPanel()
    {
        $this->showAddPanel=!$this->showAddPanel;
        $this->reset(['expertise']);
        $this->resetValidation();
    }



    public function addExpertise()
    {
        $this->validate();
        $this->inventor->expertise()->save(new IptbmInventorExpertise([
            'field' =>$this->expertise
        ]));
      $this->inventor=IptbmInventor::with("expertise","agency_name","contacts")->find($this->inventor->id);
      $this->reset(['expertise']);
     return redirect()->route('iptbm.inventor.show.profile',['id'=>$this->inventor->id]);
    }




    public function mount($inventor)
    {

        $this->inventor = $inventor;
        $this->latestAffiliation=$this->inventor->latest_agency_affiliation()->orderBy('date_affiliated')->latest()->first();
        $this->statusModel=$inventor->status;
        $this->fname=$inventor->name;
        $this->lname=$inventor->last_name;
        $this->mname=$inventor->middle_name;
        $this->sname=$inventor->suffixes;
        $this->address=$inventor->address;

    }
    public function render()
    {
        return view('livewire.iptbm.staff.inventor.inventors-profile');
    }
}
