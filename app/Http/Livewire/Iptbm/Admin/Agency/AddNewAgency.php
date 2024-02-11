<?php

namespace App\Http\Livewire\Iptbm\Admin\Agency;

use App\Models\iptbm\AgencyHead;
use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmProfile;
use App\Models\iptbm\IptbmRegion;
use Livewire\Component;

class AddNewAgency extends Component
{

    public $regions;
    public $regionId;

    public $regionModel;
    public $agencyModel;
    public $agency_code;
    public $addressModel;
    public $headModel;
    public $designationModel;


    public function saveForm()
    {
        $this->validate();
        $region = IptbmRegion::find($this->regionId);
        $agency = new IptbmAgency([
            'name' => $this->agencyModel,
            'code'=>$this->agency_code,
            'address' => $this->addressModel,
            'head'=>$this->headModel,
            'designation'=>$this->designationModel,
        ]);

        $region->agencies()->save($agency);
        $agency->profiles()->save(new IptbmProfile([]));
        $this->emit('reloadPage');
    }

    public function updatedRegionModel(): void
    {
        $data = IptbmRegion::select('id')->where('name', $this->regionModel)->first();
        $this->regionId = $data->id;

    }

    public function rules(): array
    {

        return [
            'regionModel' => [
                'required',
                'exists:iptbm_regions,name',
            ],
            'agencyModel' => [
                'required',
                'unique:iptbm_agencies,name'
            ],
            'agency_code'=>[
                'nullable',
                'unique:iptbm_agencies,code'
            ],
            'addressModel' => 'required',
            'headModel' => [
                'required',
            ],
            'designationModel' => 'required'
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount()
    {
        $this->regions = IptbmRegion::all();
    }

    public function render()
    {
        return view('livewire.iptbm.admin.agency.add-new-agency');
    }
}
