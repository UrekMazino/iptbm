<?php

namespace App\Http\Livewire\Iptbm\Staff\Inventor;

use App\Models\iptbm\IptbmInventor;
use App\Rules\FullNameValidation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddInventor extends Component
{
    public $agencies;

    public $fullName;
    public $fname;
    public $mname;
    public $lname;
    public $sname;

    public $address;
    public $status;
    public $agency = 0;

    protected $rules = [
        'fullname' => 'required|unique:iptbm_inventors,name|min:5',
        'status' => 'required|in:ACTIVE,RETIRED,DECEASED',
        'address' => 'required|min:5',
        //   'agency' =>'required',
    ];
    protected $validationAttributes = [
        'fullname' => 'Inventors name',
        'status' => 'Inventors status',
        'address' => 'Inventors address',
        //  'agency' =>'Current Agency',
    ];

    public function rules()
    {
        return [
            'status' => 'required|in:ACTIVE,RETIRED,DECEASED',
            'address' => 'required|min:5|max:50',
            'fname' => 'required|max:20',
            'mname' => 'nullable|max:1',
            'lname' => 'required|max:20',
            'sname' => 'nullable|max:5',
            'fullName' => [
                new FullNameValidation(
                    'iptbm_inventors',
                    [
                        'first_name' => ['name', $this->fname],
                        'middle_name' => ['middle_name', $this->mname],
                        'last_name' => ['last_name', $this->lname],
                        'suffixes' => ['suffixes', $this->sname],
                    ]
                )
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveRecord()
    {
        $this->validate();
        $inventor = IptbmInventor::create([
            'name' => ucfirst($this->fname),
            'middle_name' => ucfirst($this->mname),
            'last_name' => ucfirst($this->lname),
            'suffixes' => ucfirst($this->sname),
            'address' => ucfirst($this->address),
            'agency' => Auth::user()->profile->agency->id,
            'status' => $this->status
        ]);
        return redirect()->route('iptbm.inventor.show.profile', ['id' => $inventor->id]);

    }


    public function mount($agencies)
    {
        $this->agencies = $agencies;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.inventor.add-inventor');
    }
}
