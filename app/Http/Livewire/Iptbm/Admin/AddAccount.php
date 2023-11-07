<?php

namespace App\Http\Livewire\Iptbm\Admin;

use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmProfile;
use App\Models\User;
use App\Notifications\iptbm\admin\AccountCreationNotif;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;



class AddAccount extends Component
{
    public $agencies,$agency_id,$fullName,$email,$password,$password_confirmation;



    public function mount(): void
    {
        $this->agencies=IptbmAgency::all();
    }


    protected $rules =[
        'agencies' => 'required',
       // 'agencies' => 'required|unique:iptbm_profiles,agency_id',
        'fullName' => 'required|min:5',
        'email' => 'required|email|unique:users,email',
        'password' =>['required',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]+$/',
            'min:8',
        ],
        'password_confirmation'=>'required|same:password'
    ];

    public function updated($prop): void
    {

        $this->validateOnly($prop,[
            'agencies' => [
                'required',
               // Rule::unique('iptbm_profiles', 'agency_id')
            ],
            'fullName' => 'required|min:5',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
            ],
            'password' =>['required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]+$/',
                'min:8',
            ],
            'password_confirmation'=>'required|same:password'
        ]);

    }




    public function save()
    {
        $this->validate();
        $agency = IptbmAgency::with('region')->find($this->agency_id);
        $profile=null;
        if($this->checkProfile($agency->id))
        {
            $profile=IptbmProfile::where('agency_id',$agency->id)->first();
        }else{
            $profile = IptbmProfile::create([
                'region_id' => $agency->region->id,
                'agency_id' => $agency->id
            ]);
        }

        $user=new User([
            'name' => $this->fullName,
            'component' => 'IPTBM',
            'role' => 'staff',
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $profile->users()->save($user);

        $profile->save();

        $user->notify(new AccountCreationNotif($this->email,$this->password));


        return redirect()->route('iptbm.admin.addrecord.account');
    }

    public function checkProfile($agencyId)
    {
        return IptbmProfile::where('agency_id', $agencyId)->exists();
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.admin.add-account');
    }
}
