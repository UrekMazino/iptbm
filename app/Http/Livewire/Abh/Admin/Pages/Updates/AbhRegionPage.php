<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;

use App\Models\abh\AbhRegion;
use App\View\Components\abh\admin\AbhAdminApp;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AbhRegionPage extends Component
{


    public $region_name;
    public $region_rrdc;
    public $region_consortium;
    public $region_consortium_director;

    public function save_region()
    {
        $this->validate();
        AbhRegion::create([
            'name'=>$this->region_name,
            'rrdcc_chair'=>$this->region_rrdc,
            'consortium'=>$this->region_consortium,
            'consortium_director'=>$this->region_consortium_director
        ]);
        $this->emit('reloadPage');
    }

    public function rules(): array
    {
        return [
            'region_name' =>[
                'required',
                'unique:abh_regions,name',
                'max:50'
            ],
            'region_rrdc' =>[
                'unique:abh_regions,rrdcc_chair',
                'required',
                'max:50',
            ],
            'region_consortium' =>[
                'required',
                'unique:abh_regions,consortium',
                'max:50',
            ],
            'region_consortium_director' =>[
                'required',
                'unique:abh_regions,consortium_director',
                'max:50',
            ]
        ];
    }
    public function updated($props): void
    {
        $this->validateOnly($props);
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.abh.admin.pages.updates.abh-region-page')
            ->with([
                'regions' => AbhRegion::with('agencies')->get()
            ])
            ->layout(AbhAdminApp::class);
    }
}
