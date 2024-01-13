<?php

namespace App\Http\Livewire\Abh\Profile;

use Livewire\Component;

class IpTechtrans extends Component
{



    public $profile;
    public $ipPolicy;
    public $techTrans;

    public function saveTechTrans()
    {
        $this->validateOnly('techTrans');
        $this->profile->techno_transfer=boolval($this->techTrans);
        $this->profile->save();
        $this->emit('reloadPage');
    }

    public function saveIpPolicy()
    {
        $this->validateOnly('ipPolicy');
        $this->profile->ip_policy=boolval($this->ipPolicy);
        $this->profile->save();
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'ipPolicy' =>'required|boolean',
            'techTrans' =>'required|boolean',
        ];
    }
    public function mount($profile)
    {
        $this->profile=$profile;
        $this->ipPolicy=$profile->ip_policy;
        $this->techTrans=$profile->techno_transfer;
    }
    public function render()
    {
        return view('livewire.abh.profile.ip-techtrans');
    }
}
