<?php

namespace App\Http\Livewire\Iptbm\Admin\Account;

use App\Http\Controllers\ProfileController;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmProfile;
use App\Models\User;
use App\Notifications\iptbm\admin\AccountCreationNotif;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;

class AddAccount extends Component
{

    public $agencies;
    public $agencyModel;
    public $agencyId;

    public $fullname;

    public $email;


    public function updatedAgencyModel()
    {


        $temp=IptbmAgency::where('name',$this->agencyModel)->first();
        if($temp)
        {
            $this->agencyId=$temp->id;
        }

    }
    public function saveForm()
    {
        $this->validate();
        $agency = IptbmAgency::find($this->agencyId);
        $profile=null;
        if($this->checkProfile($agency->id))
        {
            $profile=IptbmProfile::where('agency_id',$agency->id)->first();
        }else{
            $profile = IptbmProfile::create([
               // 'region_id' => $agency->region->id,
                'agency_id' => $agency->id
            ]);
        }

        $password=Str::password(8,true,true,false,false);

        $user=new User([
            'name' => $this->fullname,
            'component' => 'IPTBM',
            'role' => 'staff',
            'email' => $this->email,
            'password' => Hash::make($password),
        ]);
        $profile->users()->save($user);
        $profile->save();
        $user->notify(new AccountCreationNotif($this->fullname,$this->email,$password));


        session()->flash('message', 'New Account added successfully!');

    }
    public function checkProfile($agencyId)
    {
        return IptbmProfile::where('agency_id', $agencyId)->exists();
    }


    public function rules()
    {
        return [
            'agencyModel' => [
                'required',
                'exists:iptbm_agencies,name'
            ],
            'fullname'=>[
                'required',
            ],
            'email'=>[
                'required',
                'email',
                'unique:users,email'
            ]
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }


    public function mount()
    {
        $this->agencies=IptbmAgency::pluck('name');

    }
    public function render()
    {
        return view('livewire.iptbm.admin.account.add-account');
    }
}
