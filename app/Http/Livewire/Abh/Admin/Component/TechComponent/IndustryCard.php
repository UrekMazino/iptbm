<?php

namespace App\Http\Livewire\Abh\Admin\Component\TechComponent;

use Livewire\Component;

class IndustryCard extends Component
{
    public $industry;
    public $industry_name;

    public function destroy_industry()
    {
        $this->industry->forceDelete();
        $this->emit('reloadPage');
    }
    public function restore_industry()
    {
        $this->industry->restore();
        $this->emit('reloadPage');
    }

    public function soft_delete()
    {
        $this->industry->delete();
        $this->emit('reloadPage');
    }
    public function reset_form()
    {
        $this->resetValidation(['industry_name']);
        $this->reset('industry_name');
        $this->industry_name=$this->industry->name;
    }

    public function save_industry_name()
    {
        $this->validate();
        $this->industry->name=$this->industry_name;
        $this->industry->save();
        $this->emit('reloadPage');
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function rules()
    {
        return [
            'industry_name' =>[
                'required',
                'max:80',
                'unique:abh_tech_industries,name'
            ]
        ];
    }
    public function mount($industry)
    {
        $this->industry=$industry;
        $this->industry_name=$industry->name;
    }
    public function render()
    {
        return view('livewire.abh.admin.component.tech-component.industry-card');
    }
}
