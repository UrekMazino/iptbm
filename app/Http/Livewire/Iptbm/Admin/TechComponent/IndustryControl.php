<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use App\Models\iptbm\IptbmIndustry;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class IndustryControl extends Component
{


    public $industry;
    public $industryModel;

    public function resetter()
    {
        $this->industryModel=$this->industry->name;
        $this->resetValidation(['industryModel']);

    }
    public function edit()
    {
        $this->validate();
        $this->industry->name=strtoupper($this->industryModel);
        $this->industry->save();
        $this->emit('reloadPage');
    }
    public function delete()
    {
        $this->industry->delete();
        $this->emit('reloadPage');
    }
    public $rules=[
        'industryModel'=>'required|unique:iptbm_industries,name|max:40'
    ];

    public function updated($props): void
    {
        $this->validateOnly($props);
    }
    public function mount($industry): void
    {
        $this->industry=$industry;
        $this->industryModel=$this->industry->name;
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.admin.tech-component.industry-control');
    }
}
