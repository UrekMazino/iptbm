<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Updates;

use App\Models\abh\AbhAgency;
use App\Models\abh\AbhProfile;
use App\Models\abh\AbhRegion;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmRegion;
use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhAgenciesPage extends Component
{

    public $agency_name;
    public $agency_region;
    public $agency_code;
    public $agency_address;
    public $agency_head;
    public $agency_head_designation;


    public function save_form(): void
    {
        $region=AbhRegion::where('name',$this->agency_region)->first();


        $agency=new AbhAgency([
            'abh_region_id'=>$region->id,
            'name'=>$this->agency_name,
            'code'=>$this->agency_code,
            'address'=>$this->agency_address,
            'head'=>$this->agency_head,
            'head_designation'=>$this->agency_head_designation
        ]);
        $profile=AbhProfile::create();
        $profile->agency()->save($agency);
        $this->emit('reloadPage');
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }

    public function rules(): array
    {
        return[
            'agency_name'=>[
                'required',
                'unique:abh_agencies,name',
                'max:100',
            ],
            'agency_region'=>[
                'required',
                'exists:abh_regions,name',
            ],
            'agency_code'=>[
                'required',
                'unique:abh_agencies,code',
                'max:10',
            ],
            'agency_address'=>[
                'required',
                'max:100'
            ],
            'agency_head'=>[
                'required',
                'max:100',
            ],
            'agency_head_designation'=>[
                'required',
                'max:100',
            ]
        ];
    }

    public function render()
    {
        return view('livewire.abh.admin.pages.updates.abh-agencies-page')
            ->with([
                'agencies' =>IptbmAgency::with('abh_profile','region')->latest()->get(),
                'regions'=>IptbmRegion::all()
            ])
            ->layout(AbhAdminApp::class);
    }
}
