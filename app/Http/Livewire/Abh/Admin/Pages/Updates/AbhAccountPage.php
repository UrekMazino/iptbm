<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;


use App\Models\abh\AbhProfile;
use App\Models\iptbm\IptbmAgency;
use App\Models\User;
use App\Notifications\iptbm\admin\AccountCreationNotif;
use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class AbhAccountPage extends Component
{

    public $agency_model;
    public $full_name;
    public $email;
    public $profile;
    public $countdown=5;



    public function save_form()
    {
        $this->validate();
        $agency = IptbmAgency::where('name',$this->agency_model)->first();
        if(AbhProfile::where('iptbm_agency_id', $agency->id)->exists())
        {
            $this->profile=AbhProfile::where('iptbm_agency_id', $agency->id)->first();
        }else{
            $this->profile= AbhProfile::create([
                'iptbm_agency_id'=>$agency->id
            ]);
        }
        $password = Str::password(8, true, true, false, false);

        $user = new User([
            'name' => $this->full_name,
            'component' => 'ABH',
            // 'role' => 'staff',
            'email' => $this->email,
            'password' => Hash::make($password),
        ]);
        $this->profile->users()->save($user);
        $this->profile->save();
        $user->notify(new AccountCreationNotif($this->full_name, $this->email, $password));
        session()->flash('message', 'New Account added successfully! this will be redirected to the users account page in :');
        redirect()->route('abh.admin.my_profile');
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }
    public function rules()
    {
        return[
            'agency_model'=>[
                'required',
                'exists:iptbm_agencies,name',
            ],
            'full_name'=>[
                'required',
                'max:100',
            ],
            'email'=>[
                'required',
                'email',
                'max:80',
                'unique:users,email'
            ]
        ];
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.admin.pages.updates.abh-account-page')
            ->with([
                'agencies'=>IptbmAgency::all(),
                'users'=> $users = User::with('abh_profile', 'abh_profile.agency', 'abh_profile.agency.region')
                    ->whereHas('abh_profile')
                    ->withTrashed()
                    ->get()
            ])
            ->layout(AbhAdminApp::class);
    }
}
