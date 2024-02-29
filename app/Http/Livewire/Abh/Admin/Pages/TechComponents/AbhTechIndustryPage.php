<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechComponents;


use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhTechIndustryPage extends Component
{
    public $industry_name;
    public function save_industry()
    {
        $this->validate();

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
    public function render()
    {
        return view('livewire.abh.admin.pages.tech-components.abh-tech-industry-page')
            ->with([
                'industries' =>AbhTechIndustry::with(
                    [
                        'commodities'=>function ($commodity) {$commodity->orderBy('name');},
                        'categories'=>function ($categories) {$categories->orderBy('name');},
                    ])->withTrashed()->get(),

            ])
            ->layout(AbhAdminApp::class);
    }
}
